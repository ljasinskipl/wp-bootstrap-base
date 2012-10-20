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
<?php

$args = Array(
		'posts_per_page' => 2,
		'post_format' => 'post-format-image'
);


$slidesNumber = 2; //TODO: make an option

$sliderPosts = new WP_Query();
$sliderPosts->query( $args ); //TODO: more options
$counter = 0;

?>
<div id="myCarousel" class="carousel slide"">
	<div class="carousel-inner">
	<?php while($sliderPosts->have_posts( ) ) : $sliderPosts->the_post();?>
	<?php if( $counter == 0 ) $ljplIsActive = 'active '; else $ljplIsActive = ''; ?>
	<div class="<?php echo $ljplIsActive;?>item">
		<?php the_post_thumbnail( 'image-posttype' ); ?> 
		<div class="carousel-caption">
			<h2><a href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<?php the_excerpt();?>
		</div><!-- div.carousel-caption -->
	</div><!-- div.item -->
	<?php $counter++;?>
	
<?php endwhile;?>
  </div>
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>					
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>						
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
