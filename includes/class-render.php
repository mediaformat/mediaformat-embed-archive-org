<?php
/**
 * Render class for Embed
 *
 * @package EmbedArchiveOrg
 */

namespace EmbedArchiveOrg;

/**
 *  Front end Render class
 */
class Render {

	/**
	 * Initialize the Render class.
	 *
	 * @return void
	 */
	public static function init() {
		add_filter( 'pre_oembed_result', array( self::class, 'archive_org_oembed_handler' ), 10, 2 );
	}

	/**
	 * Filters the oEmbed result before any HTTP requests are made.
	 *
	 * @param null|string $result The UNSANITIZED (and potentially unsafe) HTML that should be used to embed.
	 *                            Default null to continue retrieving the result.
	 * @param string      $url    The URL to the content that should be attempted to be embedded.
	 * @return string
	 */
	public static function archive_org_oembed_handler( $result, $url ) {
		// Validate Archive.org URL.
		if ( ! preg_match( '#https?://archive\.org/(details|embed)/([^/\s]+)#i', $url, $matches ) ) {
			return $result;
		}

		return self::get_embed_html( $url );
	}

	/**
	 * Return archive.org iFrame HTML
	 *
	 * @param  string $url Original URL of the media to embed.
	 * @return string
	 */
	public static function get_embed_html( $url ) {
		// Get Document ID.
		$identifier = self::get_identifier_from_url( $url );

		// Fetch metadata.
		$metadata = self::fetch_metadata( $identifier );

		// Generate embed HTML.
		$embed_html = self::generate_embed_html( $identifier, $metadata );

		return $embed_html;
	}

	/**
	 * Determine document identifier from URL
	 *
	 * @param  string $url Original URL of the media to embed.
	 * @return string
	 */
	private static function get_identifier_from_url( $url ) {
		if ( ! \preg_match( '#https?://archive\.org/(details|embed)/([^/\s]+)#i', $url, $matches ) ) {
			return null;
		}

		// Extract identifier.
		return $matches[2];
	}

	/**
	 * Fetch Metadata from Archive.org.
	 *
	 * @param  string $identifier Archive.org identifier for fetching metadata.
	 * @return array
	 */
	private static function fetch_metadata( $identifier ) {
		$api_url = "https://archive.org/metadata/{$identifier}";

		$response = \wp_remote_get(
			$api_url,
			array(
				'timeout' => 10,
				'headers' => array(
					'Accept' => 'application/json',
				),
			)
		);

		if ( \is_wp_error( $response ) ) {
			return null;
		}

		$body = \wp_remote_retrieve_body( $response );
		$data = \json_decode( $body, true );

		if ( \is_wp_error( $data ) ) {
			return null;
		}

		return array(
			'mediatype'   => $data['metadata']['mediatype'] ?? '',
			'title'       => $data['metadata']['title'] ?? __( 'Untitled', 'mediaformat-mediaformat-embed-archive-org' ),
			'description' => $data['metadata']['description'] ?? '',
		);
	}

	/**
	 * Generate Embed HTML
	 *
	 * @param  string $identifier Identifier for fetching iFrame.
	 * @param  array  $metadata   Metadata about the document.
	 * @return string iframe html
	 */
	private static function generate_embed_html( $identifier, $metadata ) {

		// Construct embed URL with additional parameters.
		$embed_url = "https://archive.org/embed/{$identifier}";

		$width  = '620';
		$height = '354';
		switch ( $metadata['mediatype'] ) {
			case 'collection':
				return null; // Bail, nothing to embed.
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

		// Generate iframe with responsive attributes.
		$embed_html = \sprintf(
			'<iframe class="%s" src="%s" title="%s" width="%s" height="%s" frameborder="0" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen></iframe>',
			\esc_attr( $metadata['mediatype'] ),
			\esc_url( $embed_url ),
			\esc_attr( $metadata['title'] ),
			\esc_attr( $width ),
			\esc_attr( $height ),
		);

		return $embed_html;
	}
}
