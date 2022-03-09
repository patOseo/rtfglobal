<?php
/**
 * Template Name: UK Home Page
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

			<div class="col-12 align-self-center">
				<?php the_content(); ?>
			</div>

		</div><!-- .row end -->

	</div><!-- #content -->

	<?php get_template_part('global-templates/blog-slider'); ?>

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
