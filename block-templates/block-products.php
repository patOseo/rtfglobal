<?php

$heading = get_field('heading');
$customer = get_field('customer_category');
$product_type = get_field('type_category');

$args = array(
	'post_type' => 'products',
	'posts_per_page' => -1,
	'order' => 'ASC',
	'orderby' => 'menu_order',
	'tax_query' => array(
        'relation' => 'OR',
        array(
            'taxonomy' => 'customers',
            'field'    => 'term_id',
            'terms'    => $customer,
        ),
        array(
            'taxonomy' => 'product_type',
            'field'    => 'term_id',
            'terms'    => $product_type,
        ),
    ),
);

$products = new WP_Query($args);

?>

<?php if($products->have_posts()): ?>
<div class="products-list">
	<div class="row">
		<div class="col-12">
			<?php 
				$customer_label = get_term($customer, 'customers');
				$product_type_label = get_term($product_type, 'product_type');
			?>
			<?php if($heading): ?><h2 class="text-center"><?= $heading; ?></h2><?php endif; ?>
		</div>
	</div>
	<div class="row row-eq-height">
		<?php while($products->have_posts()): $products->the_post(); ?>
			<?php $mainimg = get_field('main_image', get_the_ID()); ?>
			<div class="col-md-4">
				<div class="shadowbox hover text-center">
					<?php echo wp_get_attachment_image($mainimg, 'blog-thumb'); ?>
					<a href="<?php the_permalink(); ?>" class="stretched-link"><h2><?php the_title(); ?></h2></a>
					<button class="btn btn-md btn-primary">Learn More</button>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
</div>
<?php endif; ?>