<div class="author-info">

	<?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_email(), '100' ); }?>
	<div>
		<h3>About <?php the_author_posts_link(); ?></h3>
		<p><?php the_author_description(); ?></p>
		<?php if(get_the_author_meta('ljplgplus'):?>
		<p><a href="<?php the_author_meta('ljplgplus');?>" rel="author">Zobacz profil na Google+</a></p>
		<?php endif;?>
	</div>

</div>
