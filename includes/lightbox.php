<?php

add_action( 'wp_enqueue_scripts', 'ljpl_bootstrap_lightbox_jscss' );

function ljpl_bootstrap_lightbox_jscss() {
	wp_register_script( 'ljpl-bootstrap-lightbox', get_bloginfo('template_directory') . '/js/lightbox-resize.js' , array( 'scriptaculous-effects' ), '1.8' );
	wp_enqueue_script ( 'ljpl-bootstrap-lightbox' );
	
	wp_register_style( 'ljpl-bootstrap-lightbox', get_bloginfo('template_directory') . '/css/lightbox.css' );
	wp_enqueue_style ( 'ljpl-bootstrap-lightbox' );
}

function ljpl_bootstrap_lightbox_addrel($content) {
	global $post;
	$pattern        = "/(<a(?![^>]*?rel=['\"]lightbox.*)[^>]*?href=['\"][^'\"]+?\.(?:bmp|gif|jpg|jpeg|png)['\"][^\>]*)>/i";
	$replacement    = '$1 rel="lightbox['.$post->ID.']">';
	$content = preg_replace($pattern, $replacement, $content);
	return $content;
}

add_action( 'the_content', 'ljpl_bootstrap_lightbox_addrel', 99 );
add_action( 'the_excerpt', 'ljpl_bootstrap_lightbox_addrel', 99 );

