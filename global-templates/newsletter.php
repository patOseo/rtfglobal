<section class="newsletter bg-dark text-white" style="background-image:url('<?php the_field('newsletter_background', 'option'); ?>');" uk-scrollspy="target: .col-12; cls: uk-animation-slide-bottom-medium; repeat: false; delay: 200;">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="h1"><?php the_field('newsletter_header', 'option'); ?></div>
			</div>
			<div class="col-12">
				<?php echo do_shortcode('[gravityform id="4" title="false" description="false" ajax="true"]'); ?>
			</div>
		</div>
	</div>
</section>