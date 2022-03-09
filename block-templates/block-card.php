<?php 
$htmltag = get_field('title_html_tag');
$htmltagopen = "<" . $htmltag . " class='card-title'>";
$htmltagclose = "</" . $htmltag . ">";
?>
<div class="panel-block-container">
	<div class="card panel-block <?php if(get_field('card_link')): ?>hover<?php endif; ?>">
		<?php echo $htmltagopen; ?><?php if(get_field('card_link')): ?><a href="<?php the_field('card_link'); ?>" class="stretched-link"><?php endif; the_field('card_title'); if(get_field('card_link')): ?></a><?php endif; ?><?php echo $htmltagclose; ?>
		<hr class="divider blue">
		<p class="card-subtitle"><?php the_field('card_subtitle'); ?></p>
		<p class="card-content"><?php the_field('card_content'); ?></p>
	</div>
</div>