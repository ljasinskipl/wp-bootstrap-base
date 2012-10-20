<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		
		

		
		<?php wp_head(); ?>
		
	</head>
	<body <?php body_class(); ?>>

		<header id="main-header">
			<div  class="container">
				<div class="row">
					<div class="span12">
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					</div>
				</div>
			</div>
		</header>
		<nav style="border-bottom: 1px solid #DDD; margin:0 auto; padding:0;">
			<div class="container">
				<div class="row">
					<ul class="nav nav-tabs">
					<?php wp_nav_menu(array('fallback_cb' => 'ter_navbar_fallback','theme_location' => 'main-nav','container' => false,'items_wrap' => '%3$s','walker' => new TerWalkerNavMenu()));?>
					</ul>
				</div>
			</div>
		</nav>


			
			<div class="container" id="main-container">
			
					
				<div class="row">
