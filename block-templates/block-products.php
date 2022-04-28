<?php

$heading = get_field('heading');
$show_all = get_field('show_all');
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

$args_all = array(
	'post_type' => 'products',
	'post_status' => 'publish',
	'order' => 'ASC',
	'orderby' => 'title',
	'posts_per_page' => -1
);

if($show_all == 1) {
	$products = new WP_Query($args_all);
	$customer_categories = get_terms(array(
		'taxonomy' => 'customers'
	));
	$type_categories = get_terms(array(
		'taxonomy' => 'product_type'
	));
} else {
	$products = new WP_Query($args);
}

?>

<?php if($products->have_posts()): ?>
<div class="products-list">
	<div class="row">
		<div class="col-12">
			<?php if($heading): ?><h2 class="text-center"><?= $heading; ?></h2><?php endif; ?>
		</div>
		<?php if($show_all == 1): ?>
		<div class="col-12 mb-5">
			<div id="filterContainer" class="text-center">
			<button class="btn btn-secondary btn-sm mb-1 all active" onclick="filterSelection('all')">All</button>
			<?php foreach($customer_categories as $customer_category): ?>
				<button class="btn btn-secondary btn-sm mb-1" onclick="filterSelection('<?php echo $customer_category->slug; ?>')">For <?php echo $customer_category->name; ?></button>
			<?php endforeach; ?>
			<?php foreach($type_categories as $type_category): ?>
				<button class="btn btn-secondary btn-sm mb-1" onclick="filterSelection('<?php echo $type_category->slug; ?>')"><?php echo $type_category->name; ?></button>
			<?php endforeach; ?>
			</div>
		</div>

		<?php endif; ?>
	</div>
	<div class="row row-eq-height">
		<?php while($products->have_posts()): $products->the_post(); ?>
			<?php
				$customer_cats = get_the_terms(get_the_ID(), 'customers');
				$type_cats = get_the_terms(get_the_ID(), 'product_type');
				
				if($customer_cats) {
					$the_customer_cats = null;
					foreach($customer_cats as $customer_cat) {
						$the_customer_cats .= $customer_cat->slug . " ";
					}
				}

				if($type_cats) {
					$the_type_cats = null;
					foreach($type_cats as $type_cat) {
						$the_type_cats .= $type_cat->slug . " ";
					}
				}

			?>
			<?php $mainimg = get_field('main_image', get_the_ID()); ?>
			<div class="col-md-4 filter-product-card all <?php if($the_customer_cats) { echo $the_customer_cats; } echo " "; if($the_type_cats) { echo $the_type_cats; } ?>">
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