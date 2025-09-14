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
// \define( 'MF_EMBED_ARCHIVE_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

// Include Composer's autoload file.
if ( \file_exists( \plugin_dir_path( __FILE__ ) . 'vendor/autoload.php' ) ) {
    require_once \plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';
} else {
  \wp_trigger_error( 'Media Embed for Archive.org plugin: Composer autoload file not found. Please run `composer install`.', E_USER_ERROR );
  return;
}

/**
 * Register embed provider
 *
 * @return void
 */
function register_embed_provider(): void {
    wp_embed_register_handler(
        'archive_org',
        '#https://archive\.org/(details|embed)\?.*#i', 
        'archive_oembed_callback'
    );
}
add_action( 'init', __NAMESPACE__ . '\register_embed_provider' );

// Instantiate the classes.
$media_embed_archive_classes = array(
  EditorEmbed::class,
  BlockRender::class,
);

foreach ( $media_embed_archive_classes as $media_embed_archive_class ) {
  new $media_embed_archive_class;
}

// require 'embed.php';

/**
 * Register Script
 *
 * @return void
 */
// function mf_embed_archive_blocks_enqueue_editor_assets(): void {
//     if ( is_admin() ) {
//         $dir = __DIR__;
// 		$editor_script_asset_path = "$dir/build/index.asset.php";
// 		$editor_script_asset      = require $editor_script_asset_path;

// 		wp_enqueue_script(
// 			'block-editor',
// 			plugins_url( 'build/index.js', __FILE__ ),
// 			$editor_script_asset['dependencies'],
// 			$editor_script_asset['version'],
// 			true
// 		);
// 	}
// }
// add_action( 'enqueue_block_assets', 'mf_embed_archive_blocks_enqueue_editor_assets' );
