<header class="article-header">
	
	<h2 class="article-title"><a href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
	<p>Opublikowano <?php the_time( get_option( 'date_format' ) ) ?>
		<?php if( count( get_the_category( ) ) ) : ?>
			w kategoriach <?php the_category( ', ' );?>
		<?php endif;?>
	.</p>
	<?php if( get_the_tags( )  > 0 ) : ?>
		<p>Oznaczono tagami: <?php the_tags( ); ?>.</p>
	<?php endif; ?>
	<div class="clearfix"></div>
</header>
