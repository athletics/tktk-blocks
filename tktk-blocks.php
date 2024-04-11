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

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class TKTK_Blocks {
	const VERSION = '0.1.0';
	private static $instance = null;

	public static function getInstance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __construct() {
		define('TKTK_BLOCKS_BUILD', plugin_dir_path( __FILE__ ) . 'build/blocks/');
		add_action( 'init', array( $this, 'register_blocks' ) );
		add_filter( 'block_categories_all', array( $this, 'add_block_categories' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_editor_styles' ) );
		add_action( 'enqueue_block_assets', array( $this, 'enqueue_scripts' ) );
	}

	public function register_blocks() {
		$blocks = array_filter(glob(TKTK_BLOCKS_BUILD . '*'), 'is_dir');

		foreach ( $blocks as $block ) {
			$block_name = str_replace(TKTK_BLOCKS_BUILD, '', $block);
			register_block_type( __DIR__ . '/build/blocks/' . $block_name );
		}
	}

	public function add_block_categories( $categories ) {
		$categories[] = array(
			'slug'  => 'tktk-blocks',
			'title' => 'TKTK Blocks',
		);

		return $categories;
	}

	public function enqueue_editor_styles() {
		$assets = include( plugin_dir_path( __FILE__ ) . 'build/tktk-blocks-styles.asset.php' );
		wp_enqueue_style( 'tktk-blocks-editor', plugins_url( 'build/tktk-blocks-styles.css', __FILE__ ), $assets['dependencies'], $assets['version'] );
	}

	public function enqueue_scripts() {
		$assets = include( plugin_dir_path( __FILE__ ) . 'build/tktk-blocks-plugins.asset.php' );
		wp_enqueue_script( 'tktk-blocks-plugins', plugins_url( 'build/tktk-blocks-plugins.js', __FILE__ ), $assets['dependencies'], $assets['version'] );
	}
}

TKTK_Blocks::getInstance();
