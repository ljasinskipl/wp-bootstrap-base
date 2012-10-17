<div id="author-info">
<?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_meta( 'email' ), '100' ); }?>
<h3><?php _e('About')?> <?php the_author_posts_link(); ?></h3>
	<div class="tabbable"> <!-- Only required for left/right tabs -->
	  <ul class="nav nav-tabs">
		<li class="active"><a href="#tab1" data-toggle="tab">O mnie</a></li>
		<li><a href="#tab2" data-toggle="tab">Twitter</a></li>
		<li><a href="#tab3" data-toggle="tab">Google+</a></li>
	  </ul>
	  <div class="tab-content">
		<div class="tab-pane active" id="tab1">
			<p><?php the_author_meta( 'description' ); ?></p>
			<?php if( get_the_author_meta( 'ljplgplus' ) ):?>
			<p><a href="<?php the_author_meta('ljplgplus');?>" rel="author">Zobacz profil na Google+</a></p>
			<?php endif; ?>
		</div>
		<div class="tab-pane" id="tab2">
		  <p>Howdy, I'm in Section 2.</p>
		</div>
	  </div>
</div>
	<div class="clearfix"></div>

</div>
