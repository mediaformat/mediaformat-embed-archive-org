<?php
/**
 * Plugin Name: Media embed for Archive.org
 * Description: Embed media from Archive.org using the core/embed block.
 * Version: 1.0.0
 * Author: Mediaformat
 * Author URI: https://mediaformat.org/
 * Text Domain: mediaformat-embed-archive-org
 * License: GPLv2 or later
 *
 * @package mediaformat-embed-archive-org
 */

namespace MediaFormat\EmbedArchiveOrg;

// Prevent direct file access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

\define( 'MEDIAFORMAT_EMBED_ARCHIVE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
\define( 'MEDIAFORMAT_EMBED_ARCHIVE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

if ( ! class_exists( 'MediaFormat\\EmbedArchiveOrg\\Editor' ) && file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}
if ( ! class_exists( 'MediaFormat\\EmbedArchiveOrg\\Editor' ) ) {
	\wp_trigger_error( 'Media Embed for Archive.org plugin: Composer autoload file not found. Please run `composer install`.', E_USER_ERROR );
	return;
}


/**
 * Initialize plugin
 *
 * @return void
 */
function plugin_init() {

	Editor::init();
	Render::init();
}
\add_action( 'plugins_loaded', __NAMESPACE__ . '\plugin_init' );
