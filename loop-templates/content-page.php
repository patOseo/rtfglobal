<?php
/**
 * Partial template for content in page.php
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

		<?php if(get_the_content()): the_content(); else: ?><h2>Page Coming Soon</h2><?php endif; ?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
