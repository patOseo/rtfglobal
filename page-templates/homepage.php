<?php
/**
 * Template Name: Home Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row justify-content-center" id="products">

			<div class="col-md-7 pr-md-5 align-self-center">
				<?php the_content(); ?>
			</div>
			<div class="col-md-5 px-md-5 align-self-center" uk-scrollspy="target: .panel-block-container; cls: uk-animation-slide-bottom-medium; repeat: false; delay: 100;">
				<?php if(have_rows('panel_blocks')): ?>
					<?php while(have_rows('panel_blocks')): the_row(); ?>
						<div class="panel-block-container">
							<div class="panel-block" style="background: linear-gradient(rgb(255 255 255 / 80%),rgb(255 255 255 / 80%)), url('<?php the_sub_field('background_image'); ?>') no-repeat center center; background-size:cover;">
								<a href="<?php the_sub_field('link'); ?>" class="stretched-link"><h3 class="h4 text-center"><?php the_sub_field('title'); ?></h3></a>
							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>

		</div><!-- .row end -->

	</div><!-- #content -->

	<?php get_template_part('global-templates/blog-slider'); ?>

</div><!-- #full-width-page-wrapper -->

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Corporation",
  "name": "RTF Global",
  "url": "https://rtfglobal.com/",
  "logo": "https://rtfglobal.com/wp-content/uploads/2021/07/rtflogo.png",
  "contactPoint": [{
    "@type": "ContactPoint",
    "telephone": "905-542-2888",
    "contactType": "customer service",
    "areaServed": ["CA","US"]
  },{
    "@type": "ContactPoint",
    "telephone": "+44 (0) 1327 577507",
    "contactType": "customer service",
    "areaServed": "150"
  }],
  "sameAs": [
    "https://www.instagram.com/rtfglobal/",
    "https://twitter.com/rtfglobal",
    "https://www.facebook.com/rtfglobal",
    "https://www.linkedin.com/company/rtfglobal/",
    "https://www.youtube.com/c/rtfglobal",
    "https://www.pinterest.ca/rtfglobal/",
    "https://www.securityinformed.com/companies/rtf-global-inc.html"
  ]
}
</script>


<?php
get_footer();
