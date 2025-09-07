<?php
/**
 * Functions for the Archive.org embed block.
 *
 * @package embed-archive-org
 */

/**
 * Register embed provider
 *
 * @return void
 */
function archive_org_register_embed_provider() {
    wp_embed_register_handler(
        'archive_org',
        '#https://archive\.org/(details|embed)\?.*#i', 
        'archive_oembed_callback'
    );
}
add_action( 'init', 'archive_org_register_embed_provider' );

/**
 * Return archive.org iFrame HTML
 *
 * @param string $url
 * @return string
 */
function archive_org_get_embed_html( $url ) {
    $identifier = archive_org_get_identifier_from_url( $url );

    // Fetch metadata
    $metadata = archive_org_fetch_metadata( $identifier );
    
    // Generate embed HTML
    $embed_html = archive_org_generate_embed_html( $identifier, $metadata );

    return $embed_html;
}

/**
 * Determine document identifier from URL
 *
 * @param string $url
 * @return string
 */
function archive_org_get_identifier_from_url( $url ) {
     if ( !preg_match( '#https?://archive\.org/(details|embed)/([^/\s]+)#i', $url, $matches ) ) {
        return null;
    }

    // Extract identifier
    return $matches[2];
}

/**
 * Filters the oEmbed result before any HTTP requests are made.
 *
 * @param null|string  $result The UNSANITIZED (and potentially unsafe) HTML that should be used to embed.
 *                             Default null to continue retrieving the result.
 * @param string       $url    The URL to the content that should be attempted to be embedded.
 * @param string|array $args   Optional. Additional arguments for retrieving embed HTML.
 *                             See wp_oembed_get() for accepted arguments. Default empty.
 */
function archive_org_oembed_handler( $result, $url, $args ) {
    // Validate Archive.org URL
    if ( !preg_match( '#https?://archive\.org/(details|embed)/([^/\s]+)#i', $url, $matches ) ) {
        return $result;
    }
    return archive_org_get_embed_html( $url );
}
add_filter('pre_oembed_result', 'archive_org_oembed_handler', 10, 3);

/**
 * Fetch Metadata from Archive.org
 *
 * @param string $identifier
 * @return array
 */
function archive_org_fetch_metadata( $identifier ) {
    $api_url = "https://archive.org/metadata/{$identifier}";
    
    $response = wp_remote_get( $api_url, [
        'timeout' => 10,
        'headers' => [
            'Accept' => 'application/json'
        ]
    ]);
    
    if ( is_wp_error( $response ) ) {
        return null;
    }

    $body = wp_remote_retrieve_body( $response );
    $data = json_decode( $body, true );

    return [
        'mediatype' => $data['metadata']['mediatype'] ?? '',
        'title' => $data['metadata']['title'] ?? 'Untitled',
        'description' => $data['metadata']['description'] ?? '',
    ];
}

/**
 * Generate Embed HTML
 *
 * @param string $identifier
 * @param array $metadata
 * @return string iframe html
 */
function archive_org_generate_embed_html( $identifier, $metadata ) {
    
    // Construct embed URL with additional parameters
    $embed_url = "https://archive.org/embed/{$identifier}";
    
    $width  = '620';
    $height = '354';
    switch ( $metadata['mediatype'] ) {
        case 'collection':
            return null; // Bail, nothing to embed
            break;
        case 'audio':
            $width  = '620';
            $height = '30';
            break;
        case 'text':
        case 'video':
        default: 
            $width  = '620';
            $height = '354';
    }

    // Generate iframe with responsive attributes
    $embed_html = sprintf(
        '<iframe class="%s" src="%s" title="%s" width="%s" height="%s" frameborder="0" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen></iframe>',
        esc_attr( $metadata['mediatype'] ),
        esc_url( $embed_url ),
        esc_attr( $metadata['title'] ),
        esc_attr( $width ),
        esc_attr( $height ),
    );

    return $embed_html;
}

/**
 * Register the fallback hook for core/embed requests.
 *
 * Avoids filtering every single API request.
 *
 * @param int $post_id The post ID.
 * @return int The post ID.
 */
function register_editor_embed_hook( $post_id ) {
    add_filter( 'rest_request_after_callbacks', 'editor_embed_archive_org', 10, 3 );
    return $post_id;
}
add_filter( 'oembed_request_post_id', 'register_editor_embed_hook' );

/**
 * Returns html for the core/embed request back to the Editor.
 *
 * @param WP_REST_Response|WP_Error   $response Result to send to the client.
 * @param array                       $handler  Route handler used for the request.
 * @param WP_REST_Request             $request  Request used to generate the response.
 *
 * @return WP_REST_Response|WP_Error The response to send to the client.
 */
function editor_embed_archive_org( $response, $handler, $request ) {
    if ( is_wp_error( $response ) && 'oembed_invalid_url' === $response->get_error_code() ) {
        $url  = $request->get_param( 'url' );
        
        // Generate embed HTML
        $embed_html = archive_org_get_embed_html( $url );

        if ( $embed_html ) {
            $args = $request->get_params();
            $data = (object) array(
                'provider_name' => 'Embed Handler',
                'html'          => $embed_html,
                'scripts'       => array(),
            );

            /** This filter is documented in wp-includes/class-wp-oembed.php */
            $data->html = apply_filters( 'oembed_result', $data->html, $url, $args );

            /** This filter is documented in wp-includes/class-wp-oembed-controller.php */
            $ttl = apply_filters( 'rest_oembed_ttl', DAY_IN_SECONDS, $url, $args );

            set_transient( 'oembed_' . md5( serialize( $args ) ), $data, $ttl ); // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.serialize_serialize

            $response = new WP_REST_Response( $data );
        }
    }

    return $response;
}
