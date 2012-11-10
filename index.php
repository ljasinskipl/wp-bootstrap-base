<?php
/**
 * Theme Name: LJPL Bootstrap Base Theme
 *
 * @author ljasinskipl
 * @version $Id$
 * @since wto, 16 paź 2012, 00:39:29
 * @todo [ ] more widgetized areas
 * @todo     [ ] common sidebar
 * @todo     [ ] sidebar for pages
 * @todo     [ ] sidebar for all other templates
 * @todo [ ] excerpt-gallery
 * @todo [ ] twitter feed in author box
 * @todo [ ] styling footer navigation (nav-list) - custom widget
 * @todo [ ] shortcode for boxes
 * @todo [ ] shortcode for columns
 * @todo [ ] commercials automatic / on shortcode
 * @todo [ ] own update method
 */

	get_header(); ?>
					<div class="span9" id="content-wrapper">
						<?php // get_template_part( 'carousel' ); ?>
						<?php if (have_posts()) : while (have_posts()) : the_post();?>						
								<?php get_template_part( 'excerpt' , get_post_format() ); ?>
								<hr />											
							<?php endwhile; 
							ljpl_bootstrap_archive_pagination();
						else: ?>
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
