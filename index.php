<?php
/**
 * Plugin Name:       TKTK Blocks
 * Description:       Custom blocks dev starter with TailwindCSS
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
	$blocks = scandir( __DIR__ . '/build' );
	foreach ( $blocks as $block ) {
		if ( '.' === $block || '..' === $block ) {
			continue;
		}
		register_block_type( __DIR__ . '/build/' . $block );
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
		wp_enqueue_style( 'tktk-blocks-editor', plugins_url( 'build/tktk.css', __FILE__ ) );
	} );
}

define('TKTK_BLOCKS', 'tktk-blocks/');

add_action( 'init', 'tktk_blocks_init' );
