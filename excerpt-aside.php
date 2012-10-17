<article class="excerpt-<?php echo (get_post_format()); ?>">
	<p class="meta">Opublikowano <?php the_time( get_option( 'date_format' ) ) ?>
		<?php if( count( get_the_category( ) ) ) : ?>
			w kategoriach <?php the_category( ', ' );?>
		<?php endif;?>
	.</p>
	<?php if( get_the_tags( )  > 0 ) : ?>
		<p class="meta">Oznaczono tagami: <?php the_tags( '' ); ?>.</p>
	<?php endif; ?>
	
	<div class="content"><?php the_content(__('(more...)')); ?></div>
	<div class="clearfix"></div>	
</article>
