<article class="excerpt-image">
<?php
	$attachments = get_children(array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order'));
	if ( ! is_array($attachments) ) continue;
	$count = count($attachments);
	$first_attachment = array_shift($attachments);
	
	if($count) :
		echo wp_get_attachment_image($first_attachment->ID, 'image-posttype'); ?>
		<div class="overlay">
			<h2 class="article-title"><a href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<p><?php the_excerpt();?></p>
			<p><?php the_time( get_option( 'date_format' ) ) ?></p>
		</div>
		
	<?php else: ?>
	<?php get_template_part( 'metadata', get_post_format() ); ?>
	<p><?php the_content(__('(more...)')); ?></p>
	<?php endif; ?>
</article>
