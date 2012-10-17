<article class="excerpt-<?php echo (get_post_format()); ?>">
	<?php get_template_part( 'metadata', get_post_format() ); ?>
	<p><?php the_content(__('(more...)')); ?></p>
	<div class="clearfix"></div>	
</article>
