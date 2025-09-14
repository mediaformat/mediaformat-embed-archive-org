<?php 
/**
 * Plugin Name: Media embed for Archive.org
 * Description: Embed media from Archive.org using the core/embed block.
 * Version: 1.0.0
 * Author: Mediaformat
 * Author URI: https://mediaformat.org/
 * Text Domain: embed-archive-org
 * License: GPLv2 or later
 * 
 * @package embed-archive-org
 */

namespace EmbedArchiveOrg;

// Prevent direct file access
if (!defined('ABSPATH')) {
    exit;
}

\define( 'MF_EMBED_ARCHIVE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

if ( ! class_exists( EmbedArchiveOrg\EditorEmbed::class ) && file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
    require_once __DIR__ . '/vendor/autoload.php';
}
if ( ! class_exists( EmbedArchiveOrg\EditorEmbed::class ) ) {
    \wp_trigger_error( 'Media Embed for Archive.org plugin: Composer autoload file not found. Please run `composer install`.', E_USER_ERROR );
    return;
}

/**
 * Register embed provider
 *
 * @return void
 */
function register_embed_provider(): void {
    \wp_embed_register_handler(
        'archive_org',
        '#https://archive\.org/(details|embed)\?.*#i', 
        'archive_oembed_callback'
    );
}

/**
 * Initialize plugin
 *
 * @return void
 */
function plugin_init () {
    \add_action( 'init', __NAMESPACE__ . '\register_embed_provider' );

    EditorEmbed::init();
    BlockRender::init();
}
\add_action( 'plugins_loaded', __NAMESPACE__ . '\plugin_init' );
