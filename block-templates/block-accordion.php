<?php 
$htmltag = get_field('title_html_tag'); 
$htmltagopen = "<" . $htmltag . " class='mb-0'>";
$htmltagclose = "</" . $htmltag . ">";

?>

<?php if(have_rows('accordion')): ?>

	<div id="accordion">
		<?php $i = 1; while(have_rows('accordion')): the_row(); ?>

			<div class="card">
				<div class="card-header shadowbox hover" id="heading<?php echo $i; ?>">
					<?php echo $htmltagopen; ?><button class="btn stretched-link" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>"><i class="fa fa-plus"></i><?php the_sub_field('title'); ?></button><?php echo $htmltagclose; ?>
				</div>
				<div id="collapse<?php echo $i; ?>" class="collapse" aria-labelledby="heading<?php echo $i; ?>" data-parent="#accordion">
					<div class="card-body">
						<?php the_sub_field('content'); ?>
					</div>
				</div>
			</div>

		<?php $i++; endwhile; ?>
	</div>

<?php endif; ?>