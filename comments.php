<?php if ( have_comments() || 'open' == $post->comment_status ): ?>
<div class="comments-template">
	<h2>Komentarze</h2>
	<ul>
		<?php wp_list_comments( array( 'type' => 'comment', 'avatar_size' => 96, 'callback' => 'ljpl_bootstrap_comment' ) ); ?> 
	</ul>
	<div class="clearfix"></div>
	<?php comment_form(); 
	?>

</div>
<hr />

<?php endif;?>
