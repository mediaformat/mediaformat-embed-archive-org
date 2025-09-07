<?php 
/**
 * Plugin Name: Archive.org Block
 * Description: Embed content from Archive.org using the core/embed block.
 * Version: 1.0.0-rc.1
 * Author: Mediaformat
 * Author URI: https://mediaformat.org/
 * Text Domain: archive-embed
 * 
 * @package archive-embed
 */

// Prevent direct file access
if (!defined('ABSPATH')) {
    exit;
}

require 'embed.php';

/**
 * Register Script
 *
 * @return void
 */
function archive_blocks_enqueue_editor_assets(): void {
    if ( is_admin() ) {
        $dir = __DIR__;
		$editor_script_asset_path = "$dir/build/index.asset.php";
		$editor_script_asset      = require $editor_script_asset_path;

		wp_enqueue_script(
			'block-editor',
			plugins_url( 'build/index.js', __FILE__ ),
			$editor_script_asset['dependencies'],
			$editor_script_asset['version'],
			true
		);
	}
}
add_action( 'enqueue_block_assets', 'archive_blocks_enqueue_editor_assets' );
