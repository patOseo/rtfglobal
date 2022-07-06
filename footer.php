<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$page_id = get_queried_object_id();

$container = get_theme_mod( 'understrap_container_type' );
$logo = get_field('logo', 'option');

?>

<?php if(!is_page(1495) && !is_page(1896) && get_field('footer_contact_form') != 1): ?>
	<?php get_template_part('global-templates/newsletter'); ?>
<?php endif; ?>

</div><!-- #page we need this extra closing tag here -->

<div class="wrapper" id="wrapper-footer">

	<footer class="site-footer" id="colophon">

		<div class="<?php echo esc_attr( $container ); ?>">
	
			<div class="row">
	
				<div class="col-md-6">
					<div class="footer-logo"><?php echo wp_get_attachment_image($logo, 'full'); ?></div>
					<div class="footer-slogan"><?php the_field('slogan', 'option'); ?></div>
					<?php if(have_rows('social_media_links', 'option')): ?>
						<div class="footer-social">
							<?php while(have_rows('social_media_links', 'option')): the_row(); ?>
								<a href="<?php the_sub_field('link'); ?>" target="_blank" rel="noopener,noreferrer">
									<span class="fa-stack">
										<i class="fa fa-circle fa-stack-2x"></i>
										<i class="fa <?php the_sub_field('icon'); ?> fa-stack-1x fa-inverse"></i>
									</span>
								</a>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="col-md-6">
					<div class="h3 footer-heading">Contact RTF</div>
					<hr class="divider blue">
					<?php if(have_rows('offices', 'option')): ?>
						<div class="row">
							<?php while(have_rows('offices', 'option')): the_row(); ?>
								<div class="col-md-6">
									<?php if(get_sub_field('office_page')): echo '<a href="' . get_sub_field('office_page') . '">'; endif; ?><p class="office-title"><strong><?php the_sub_field('title'); ?></strong></p><?php if(get_sub_field('office_page')): echo '</a>'; endif; ?>
									<div class="office-address"><?php the_sub_field('address'); ?></div>
									<p class="office-phone"><a href="tel:<?php the_sub_field('phone_number'); ?>"><?php the_sub_field('phone_number'); ?></a></p>
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
	
			</div><!-- row end -->
	
		</div><!-- container end -->

	</footer><!-- #colophon -->

</div><!-- wrapper end -->

<?php wp_footer(); ?>

</body>

</html>

