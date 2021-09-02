<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="col-md-4 mb-5">
	<div class="card blog-index-card h-100">
	    <div class="card-body d-flex flex-column">
			<a class="stretched-link" href="<?php the_permalink(); ?>"><h3 class="blog-title"><?php the_title(); ?></h3></a>
			<p class="blog-date"><?php the_date(); ?></p>
	    	<div class="mt-auto"><?php the_post_thumbnail('blog-thumb'); ?></div>
	    </div>
	</div>
</div>
