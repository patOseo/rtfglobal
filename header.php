<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
$logo = get_field('logo', 'option');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-27684149-4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-27684149-4');
</script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-THLT39H');</script>
<!-- End Google Tag Manager -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-THLT39H"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<div class="site-header">
		<?php if(is_front_page()): ?>
			<?php while(have_rows('background_images', 6)): the_row(); ?>
				<figure style="background-image: url('<?php the_sub_field('image'); ?>');"></figure>
			<?php endwhile; ?>
		<?php endif; ?>
		<!-- ******************* The Navbar Area ******************* -->
		<div id="wrapper-navbar" uk-sticky>
	
			<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>
	
			<nav id="main-nav" class="navbar navbar-expand-md navbar-dark" aria-labelledby="main-nav-label">
	
						<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo wp_get_attachment_image($logo, 'full'); ?></a>
	
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
						<span class="navbar-toggler-icon"></span>
					</button>

					<!-- The Top Menu goes here -->
					<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'top-menu',
							// 'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'topNavDropdown',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'top-menu',
							'depth'           => 2,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					);
					?>
	
					<!-- The Main Menu goes here -->
					<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'depth'           => 2,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					);
					?>
	
			</nav><!-- .site-navigation -->
	
		</div><!-- #wrapper-navbar end -->

		<div class="container">
			<?php if(is_front_page()): ?>
				<div class="front-page-heading uk-animation-slide-bottom-medium"><h1><?php the_field('slogan', 'option'); ?></h1></div>
				<div class="home-arrow mx-auto"><a href="#products"><i class="fa fa-chevron-down"></i></a></div>
			<?php elseif(is_home()): ?>
				<div class="page-heading uk-animation-slide-bottom-medium mx-auto my-auto"><h1>Our Blog</h1></div>
			<?php elseif(is_singular('post') || is_singular('products')): ?>

			<?php else: ?>
				<div class="page-heading uk-animation-slide-bottom-medium mx-auto my-auto"><h1><?php the_title(); ?></h1></div>
			<?php endif; ?>
		</div>
	</div>
