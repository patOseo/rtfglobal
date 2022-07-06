<?php 
$htmltag = get_field('title_html_tag');
$htmltagopen = "<" . $htmltag . ">";
$htmltagclose = "</" . $htmltag . ">";
$panel_link = get_field('link');
?>
<div class="panel-block-container">
	<div class="position-relative text-center panel-block <?php if($panel_link): ?>hover<?php endif; ?>" style="background: linear-gradient(rgb(255 255 255 / 80%),rgb(255 255 255 / 80%)), url('<?php the_field('background_image'); ?>') no-repeat center center; background-size:cover;">
		<?php echo $htmltagopen; ?><?php if($panel_link): ?><a href="<?= $panel_link; ?>" class="stretched-link"><?php endif; the_field('title'); if($panel_link): ?></a><?php endif; ?><?php echo $htmltagclose; ?>
	</div>
</div>