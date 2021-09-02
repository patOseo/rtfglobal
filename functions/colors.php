<?php

function wpdc_add_custom_gutenberg_color_palette() {
	add_theme_support(
		'editor-color-palette',
		[
			[
				'name'  => esc_html__( 'Red', 'wpdc' ),
				'slug'  => 'red',
				'color' => '#d90416',
			],
			[
				'name'  => esc_html__( 'Blue', 'wpdc' ),
				'slug'  => 'blue',
				'color' => '#23a5d9',
			],
			[
				'name'  => esc_html__( 'Navy Blue', 'wpdc' ),
				'slug'  => 'navy-blue',
				'color' => '#2d3339',
			],
			[
				'name'  => esc_html__( 'Dark Gray', 'wpdc' ),
				'slug'  => 'dark-gray',
				'color' => '#60605f',
			],

		]
	);
}
add_action( 'after_setup_theme', 'wpdc_add_custom_gutenberg_color_palette' );