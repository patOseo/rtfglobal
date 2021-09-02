<?php

// Enqueue block CSS for the editor
function custom_blocks_editor_scripts() {
	// Enqueue block editor styles
    wp_enqueue_style(
        'custom-blocks-editor-css',
        get_stylesheet_directory_uri() . '/css/custom-blocks.css',
        [ 'wp-edit-blocks' ]
    );
}


// Create custom Gutenberg block category for ACF Blocks
function acf_block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'acf-blocks',
				'title' => __( 'Custom Blocks', 'acf-blocks' ),
			),
		)
	);
}
add_filter( 'block_categories', 'acf_block_category', 1, 2);


// Hook the enqueue functions into the editor
add_action( 'enqueue_block_editor_assets', 'custom_blocks_editor_scripts' );


function acf_custom_blocks() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {

		// register divider block
		acf_register_block(array(
			'name'				=> 'divider',
			'title'				=> __('Divider'),
			'description'		=> __('A custom block for divider'),
			'mode'				=> 'edit',
			'render_template'	=> 'block-templates/block-divider.php',
			'category'			=> 'acf-blocks',
			'icon'				=> 'minus',
			'keywords'			=> array( 'divider', 'bar' ),
		));
		
		// register call-to-action block
		acf_register_block(array(
			'name'				=> 'call-to-action',
			'title'				=> __('CTA Button'),
			'description'		=> __('A custom block for call-to-action'),
			'mode'				=> 'edit',
			'render_template'	=> 'block-templates/block-cta.php',
			'category'			=> 'acf-blocks',
			'icon'				=> 'slides',
			'keywords'			=> array( 'call to action', 'button' ),
		));

		// accordion block
		acf_register_block(array(
			'name'				=> 'accordion',
			'title'				=> __('Accordion'),
			'description'		=> __('A custom block to display a FAQ-style accordion.'),
			'mode'				=> 'edit',
			'render_template'	=> 'block-templates/block-accordion.php',
			'category'			=> 'acf-blocks',
			'icon'				=> 'excerpt-view',
			'keywords'			=> array( 'faq', 'accordion' ),
		));

		// register card block
		acf_register_block(array(
			'name'				=> 'card',
			'title'				=> __('Card'),
			'description'		=> __('A custom block for content card.'),
			'render_template'	=> 'block-templates/block-card.php',
			'category'			=> 'acf-blocks',
			'icon'				=> 'tablet',
			'keywords'			=> array( 'card', 'box' ),
		));

		// Product list block
		acf_register_block(array(
			'name'				=> 'product-list',
			'title'				=> __('Product List'),
			'description'		=> __('A custom block for listing products.'),
			'render_template'	=> 'block-templates/block-products.php',
			'category'			=> 'acf-blocks',
			'icon'				=> 'smartphone',
			'keywords'			=> array( 'products', 'list' ),
		));

		// Product list block
		acf_register_block(array(
			'name'				=> 'single-product',
			'title'				=> __('Single Product'),
			'description'		=> __('A custom block for single product.'),
			'render_template'	=> 'block-templates/block-single-product.php',
			'category'			=> 'acf-blocks',
			'icon'				=> 'smartphone',
			'keywords'			=> array( 'product', 'single' ),
		));
	}
}

add_action('acf/init', 'acf_custom_blocks');