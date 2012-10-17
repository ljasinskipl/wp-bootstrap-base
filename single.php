<?php get_header(); ?>
					<div class="span9" id="content-wrapper">
						<?php if (have_posts()) : the_post(); ?>
							<article>
								
								<?php get_template_part( 'metadata', get_post_format() ); ?>
								
								<?php if(function_exists('bcn_display')): //BreadCrumbsXT
								?>
								<div class="breadcrumbs">
									<?php bcn_display();?>
								</div>
								<hr />
								<?php endif;?>
								<?php get_template_part( 'content', get_post_format() ); ?>
								
								
								<?php ljpl_bootstrap_single_pagination( array(
									'before'           => '<nav class="pagination pagination-centered">',
									'after'            => '</nav>',
									'link_before'      => '',
									'link_after'       => '',
									'next_or_number'   => 'number',
									'nextpagelink'     => __('Next page'),
									'previouspagelink' => __('Previous page'),
									'pagelink'         => '%',
									'echo'             => 1 ) ); ?> 
								
								<hr />								
								<?php get_template_part( 'authorinfo', $posts[0]->post_author ); ?>
								<hr />
								<?php comments_template(); ?>
								
								<?php if (function_exists('wp_get_shortlink')) { ?>
								<div><span class="post-shortlink">Shortlink:
								<input type='text' value="<?php echo wp_get_shortlink(get_the_ID()); ?>" onclick='this.focus(); this.select();' /></span></div>
								<?php } ?>
								
							</article>
							


						<?php else: ?>
							<article class="noarticle">
								<?php get_template_part( 'content', 'empty' ); ?>
								<p><?php _e('Sorry, we couldn’t find the post you are looking for.'); ?></p>
							</article>
						<?php endif; ?>
					</div> <!-- #content-wrapper -->

					<div id="sidebar" class="span3">	
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("main-sidebar") ) : ?>Default left sidebar stuff here…
						<?php endif; ?>
					</div>	<!-- #sidebar -->
<?php get_footer(); ?>
