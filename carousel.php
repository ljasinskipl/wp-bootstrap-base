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
