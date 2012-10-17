<?php

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Main sidebar',
		'id'=> 'main-sidebar',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
	
	register_sidebar( array(
		'name' => 'Footer1',
		'id' => 'footer1',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
	) );
	register_sidebar( array(
		'name' => 'Footer2',
		'id' => 'footer2',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
	) );
	register_sidebar( array(
		'name' => 'Footer3',
		'id' => 'footer3',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
	) );
}
