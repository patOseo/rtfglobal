<?php
/**
 * Single post partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$image = get_field('main_image');
$additional_images = get_field('images');
$firstimg = $additional_images[0];
$gallerycount = count($additional_images);
?>

<div class="col-12">
	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	

		<?php if(have_rows('product_sections')): ?>
				<?php $i = 1; ?>
				<?php while(have_rows('product_sections')): the_row(); ?>
					<?php $rowCount = count(get_field('product_sections')); ?>
					<?php $mainimgs = get_sub_field('main_images'); ?>
					<div class="product-row">
						<div class="row">
							<div class="col-md-6 align-self-center">
								<?php if(get_sub_field('static_or_slider') == 1): ?>
									<div class="additional-images" uk-slideshow="ratio: 4:3">
										<div class="uk-slideshow-items">
											<?php foreach($mainimgs as $img): ?>
												<div class="slideshow-item">
													<?php echo wp_get_attachment_image($img, 'full'); ?>
												</div>
											<?php endforeach; ?>
										</div>
										<div class="slideshow-nav">
											<a href="#" uk-slideshow-item="previous"><i class="fa fa-angle-left"></i></a>
	   										<a href="#" uk-slideshow-item="next"><i class="fa fa-angle-right"></i></a>
	   									</div>
									</div>
								<?php else: ?>
									<?php foreach($mainimgs as $img):  ?>
										<?php echo wp_get_attachment_image($img, 'full'); ?>
									<?php endforeach; ?>
								<?php endif; ?>
							</div>
							<div class="col-md-6 align-self-center">
								<?php if($i == 1): ?>
									<h1><?php the_title(); ?></h1>
									<hr class="divider red">
								<?php endif; ?>
								<?php the_sub_field('description'); ?>
									<a href="/contact-us/" class="btn btn-primary btn-md"><i class="fa fa-plus"></i> Get A Quote</a>
	
							</div>
						</div>
					</div>
				<?php $i++; endwhile; ?>
		<?php endif; ?>

		<!-- <div class="row">
			<div class="col-md-6 align-self-center">
				<?php echo wp_get_attachment_image($image, 'full'); ?>
				<?php if($gallerycount == 1): ?>
					<?php echo wp_get_attachment_image($additional_images[0], 'full'); ?>
				<?php endif; ?>
			</div>
			<div class="col-md-6 align-self-center">
				<h1><?php the_title(); ?></h1>
				<hr class="divider red">
				<?php the_field('description'); ?>
				<a href="/contact-us/" class="btn btn-primary btn-md"><i class="fa fa-plus"></i> Get A Quote</a>
			</div>
		</div> -->

		<?php if(get_field('add_video')): ?>
			<?php if(get_field('video_link')): ?>
				<div class="embed-container">
					<?php the_field('video_link'); ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>
	
		<?php if(get_field('add_slider')): ?>
			<?php if($additional_images && $gallerycount > 1): ?>
				<div class="row">
					<div class="col-12">
						<div class="additional-images" uk-slideshow>
							<div class="uk-slideshow-items">
								<?php foreach($additional_images as $img): ?>
									<div class="slideshow-item">
										<?php echo wp_get_attachment_image($img, 'full'); ?>
									</div>
								<?php endforeach; ?>
							</div>
							<div class="slideshow-nav">
								<a href="#" uk-slideshow-item="previous"><i class="fa fa-angle-left"></i></a>
	   							<a href="#" uk-slideshow-item="next"><i class="fa fa-angle-right"></i></a>
	   						</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
		<?php endif; ?>
	
	</article><!-- #post-## -->
</div>
