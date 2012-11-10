<header class="article-header">
	<?php if( is_single( ) || is_page( ) ): ?>
		<?php if(! get_post_meta( $post->ID, 'hide_title', true ) ): ?>
			<h1 class="article-title"><?php the_title(); ?></h1>
		<?php endif;?>
	<?php else: ?>
		<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft') ); ?> 
		<h2 class="article-title"><a href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
	<?php endif; ?>
	<?php if( !is_page( ) ):?>
		<p>Opublikowano <?php the_time( get_option( 'date_format' ) ) ?>
			<?php if( count( get_the_category( ) ) ) : ?>
				w kategoriach <?php the_category( ', ' );?>
			<?php endif;?>
		.</p>
		<?php if( get_the_tags( )  > 0 ) : ?>
			<p>Oznaczono tagami: <?php the_tags( '' ); ?>.</p>
		<?php endif; ?>
	<?php endif;?>
	<div class="clearfix"></div>
</header>
