<?php

function gutenberg_examples_dynamic_block_block_init() {

	register_block_type(
		__DIR__,
		array(
			'render_callback' => 'gutenberg_examples_dynamic_block_render_callback',
		)
	);
}
add_action( 'init', 'gutenberg_examples_dynamic_block_block_init' );

function gutenberg_examples_dynamic_block_render_callback( $attributes, $content, $block_instance ) {
	ob_start();
	require plugin_dir_path( __FILE__ ) . 'template.php';
	return ob_get_clean();
}
