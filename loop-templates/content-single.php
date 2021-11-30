<?php
/**
 * Single post partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="col-9">
	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	
		<header class="entry-header">
	
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	
			<div class="entry-meta">
	
				<?php the_date('F j, Y'); ?> by <?php the_author(); ?>
	
			</div><!-- .entry-meta -->
	
		</header><!-- .entry-header -->
	
		<div class="featured-image"><?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?></div>
	
		<div class="entry-content">
	
			<?php the_content(); ?>
	
		</div><!-- .entry-content -->
	
	</article><!-- #post-## -->
</div>