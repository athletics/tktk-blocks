<?php
/**
 * Plugin Name:       TKTK Blocks
 * Description:       A custom blocks starter with tailwind and helper components for your next project.
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Britton Walker
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       tktk-blocks
 *
 * @package           tktk
 */

function tktk_blocks_init() {

	define('TKTK_BLOCKS_BUILD', plugin_dir_path( __FILE__ ) . 'build/blocks/');

	$blocks = array_filter(glob(TKTK_BLOCKS_BUILD . '*'), 'is_dir');

	foreach ( $blocks as $block ) {
		$block_name = str_replace(TKTK_BLOCKS_BUILD, '', $block);
		register_block_type( __DIR__ . '/build/blocks/' . $block_name );
	}

	add_filter( 'block_categories_all' , function( $categories ) {
		$categories[] = array(
			'slug'	=> 'tktk-blocks',
				'title' => 'TKTK Blocks',
		);

		return $categories;
	});

	// Enqueue editor stylesheet
	add_action( 'enqueue_block_editor_assets', function() {
		wp_enqueue_style( 'tktk-blocks-editor', plugins_url( 'build/tktk-block-styles.css', __FILE__ ), array(), filemtime( plugin_dir_path( __FILE__ ) . 'build/tktk-block-styles.css' ) );
	});

	add_action( 'enqueue_block_assets', function() {
		$assets = include( plugin_dir_path( __FILE__ ) . 'build/tktk-blocks-plugins.asset.php' );
		wp_enqueue_script( 'tktk-blocks-plugins', plugins_url( 'build/tktk-blocks-plugins.js', __FILE__ ), $assets['dependencies'], $assets['version'] );
	});
}

define('TKTK_BLOCKS', 'tktk-blocks/');

require __DIR__ . '/inc/api-routes.php';
