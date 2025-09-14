<?php
/**
 * 
 * @package embed-archive-org
 */

namespace EmbedArchiveOrg;

use WP_REST_Response;
use \EmbedArchiveOrg\BlockRender;

/**
 * 
 */
class EditorEmbed {

	public function __construct() {
        add_action( 'enqueue_block_assets', [ self::class, 'enqueue_editor_assets'] );
        add_filter( 'oembed_request_post_id', [ self::class, 'editor_embed_hook' ] );
	}

    /**
     * Register Script
     *
     * @return void
     */
    public static function enqueue_editor_assets(): void {
        if ( \is_admin() ) {
            $dir = MF_EMBED_ARCHIVE_PLUGIN_DIR;
            $editor_script_asset_path = "$dir/build/index.asset.php";
            $editor_script_asset      = require $editor_script_asset_path;

            \wp_enqueue_script(
                'block-editor',
                \plugins_url( 'build/index.js', __FILE__ ),
                $editor_script_asset['dependencies'],
                $editor_script_asset['version'],
                true
            );
        }
    }

    /**
     * Register the fallback hook for core/embed requests.
     *
     * Avoids filtering every single API request.
     *
     * @param int $post_id The post ID.
     * @return int The post ID.
     */
    public static function editor_embed_hook( $post_id ) {
        \add_filter( 'rest_request_after_callbacks', [ self::class, 'editor_embed_request'], 10, 3 );
        return $post_id;
    }

    /**
     * Returns html for the core/embed request back to the Editor.
     *
     * @param WP_REST_Response|WP_Error   $response Result to send to the client.
     * @param array                       $handler  Route handler used for the request.
     * @param WP_REST_Request             $request  Request used to generate the response.
     *
     * @return WP_REST_Response|WP_Error The response to send to the client.
     */
    public static function editor_embed_request( $response, $handler, $request ) {
        if ( \is_wp_error( $response ) && 'oembed_invalid_url' === $response->get_error_code() ) {
            $url  = $request->get_param( 'url' );
            
            // Generate embed HTML
            $embed_html = BlockRender::get_embed_html( $url );

            if ( $embed_html ) {
                $args = $request->get_params();
                $data = (object) array(
                    'provider_name' => 'Archive.org',
                    'html'          => $embed_html,
                    'scripts'       => array(),
                );

                /** This filter is documented in wp-includes/class-wp-oembed.php */
                $data->html = \apply_filters( 'oembed_result', $data->html, $url, $args );

                /** This filter is documented in wp-includes/class-wp-oembed-controller.php */
                $ttl = \apply_filters( 'rest_oembed_ttl', DAY_IN_SECONDS, $url, $args );

                \set_transient( 'oembed_' . md5( serialize( $args ) ), $data, $ttl ); // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.serialize_serialize

                $response = new WP_REST_Response( $data );
            }
        }

        return $response;
    }

}