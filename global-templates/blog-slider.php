<?php

$args = array(
	'post_type' => 'post',
    'post__not_in' => array($post->ID),
	'posts_per_page' => 8
);

$blogs = new WP_Query($args);

?>

<?php if($blogs->have_posts()): ?>
<section class="section-blog-slider" uk-scrollspy="cls:uk-animation-slide-bottom-medium; delay: 100;">
	<div class="container">
                <div class="row">
                        <?php if(is_single()): ?>
                            <h2 class="h1">More Blogs</h2>
                        <?php else: ?>
                            <h2 class="h1">From the Blog</h2>
                        <?php endif; ?>
                </div>
		<div class="row">
			<div class="uk-slider" uk-slider="finite:1">
				<div class="uk-slider-container-offset">
					<ul class="uk-slider-items uk-child-width-1-3@s uk-child-width-1-4@ uk-grid">
				        <?php while($blogs->have_posts()): $blogs->the_post(); ?>
        			    	<li>
        			    	    <div class="card blog-index-card h-100">
                                                <div class="card-body d-flex flex-column">
        			    	    	   <a class="stretched-link" href="<?php the_permalink(); ?>"><h3 class="blog-title"><?php the_title(); ?></h3></a>
        			    	    	   <p class="blog-date"><?php the_date(); ?></p>
                                                   <div class="mt-auto"><?php the_post_thumbnail('blog-thumb'); ?></div>
                                                </div>
        			    	    </div>
        			    	</li>
        				<?php endwhile; ?>
                                        <li>
                                            <div class="card blog-index-card h-100">
                                                <div class="card-body d-flex flex-column">
                                                   <div class="my-auto mx-auto card-buttons">
                                                           <a href="/blog/" class="btn btn-secondary btn-lg">View All Blogs</a>
                                                           <a href="#" uk-slider-item="0" class="btn btn-secondary btn-sm"><i class="fa fa-chevron-left"></i> Back to Start</a>
                                                   </div>
                                                </div>
                                            </div>
                                        </li>

        			</ul>
        		</div>
        		<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>