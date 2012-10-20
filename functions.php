<?php
/**
 * LJPL Bootstrap Theme
 *
 * @author ljasinskipl
 * @version $Id$
 * @since pon, 15 paź 2012, 15:39:14
 */


/*******************************************************************************
 *
 * Base CSS & JS
 * 
 ******************************************************************************/

add_action( 'wp_enqueue_scripts', 'ljpl_bootstrap_styles' );

function ljpl_bootstrap_styles() {

	// -- main CSS files
    wp_register_style( 'ljpl-bootstrap-min', get_bloginfo('template_directory') . '/css/bootstrap.min.css' );
    wp_register_style( 'ljpl-bootstrap-responsive', get_bloginfo('template_directory') . '/css/bootstrap-responsive.css' );
	wp_register_style( 'ljpl-bootstrap-main', get_bloginfo('stylesheet_url') );

	wp_enqueue_style( 'ljpl-bootstrap-min' );
	wp_enqueue_style( 'ljpl-bootstrap-responsive' );
	wp_enqueue_style( 'ljpl-bootstrap-main' );
		
	// -- jQuery - one script to rule them alL	
    wp_enqueue_script( 'jquery' );
    
    wp_enqueue_script( 'bootstrap-js', get_bloginfo('template_directory') . '/js/bootstrap.js', null, '', true);
    wp_enqueue_script( 'jlpl-bootstrap-js', get_bloginfo('template_directory') . '/js/ljpl-bootstrap.js', '', true);
	
	// -- gravatar hovercards
	// TODO: FIX
	wp_enqueue_script( 'gprofiles', 'http://s.gravatar.com/js/gprofiles.js', array( 'jquery' ), 'e', true );
	
	wp_deregister_script( 'prototype' );
	//wp_deregister_script( 'scriptacalous' );
}

/*******************************************************************************
 *
 * Navigation
 * 
 ******************************************************************************/

include_once( get_template_directory() . '/includes/ljpl-bootstrap-navigation.php' );
include_once( get_template_directory() . '/includes/ljpl-bootstrap-pagination.php' );

/*******************************************************************************
 *
 * Dashboard menu
 * 
 ******************************************************************************/
 
include_once( get_template_directory() . '/includes/dashboard-common-topmenu.php' );
include_once( get_template_directory() . '/includes/dashboard-func.php' );

/*******************************************************************************
 *
 * User info
 * 
 ******************************************************************************/
 
include_once( get_template_directory() . '/includes/ljpl-bootstrap-userprofile.php' );


/*******************************************************************************
 *
 * Featured image sizes
 * 
 ******************************************************************************/

// -- theme support fo thumbnails
add_theme_support( 'post-thumbnails' ); 

// -- custom sizes
add_image_size( 'gallery-thumb', 250, 250, true ); // thumbnails for gallery shortcode
add_image_size( 'image-posttype', 870, 300, true ); // featured image for 'image' post format

add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}


/*******************************************************************************
 *
 * Featured image sizes
 * 
 ******************************************************************************/

include( get_template_directory() . '/includes/ljpl-shortcode-accordion.php' );

add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );
// This theme styles the visual editor with editor-style.css to match the theme style.
add_editor_style();

// Adds RSS feed links to <head> for posts and comments.
add_theme_support( 'automatic-feed-links' );

// -- lightbox
// TODO: conditional - according to options in backend
include_once( get_template_directory() . '/includes/lightbox.php' );	



// -- clickable links in posts and excerpts
// source: http://wpsnipp.com/index.php/excerpt/convert-uri-www-ftp-and-emails-into-clickable-links/
add_filter('the_content', 'make_clickable');
add_filter('the_excerpt', 'make_clickable');

// -- sidebars
include_once( get_template_directory() . '/includes/sidebars.php' );

// -- pagination




// -- tinyMCE buttons
// TODO: Move to plugin

add_filter('mce_buttons','ljpl_bootstrap_wysiwyg_editor');
function ljpl_bootstrap_wysiwyg_editor($mce_buttons) { // source: http://wpsnipp.com/index.php/functions-php/add-next-page-button-in-wysiwyg-editor/
    $pos = array_search('wp_more',$mce_buttons,true);
    if ($pos !== false) {
        $tmp_buttons = array_slice($mce_buttons, 0, $pos+1);
        $tmp_buttons[] = 'wp_page';
        $mce_buttons = array_merge($tmp_buttons, array_slice($mce_buttons, $pos+1));
    }
    return $mce_buttons;
}

function themeit_mce_buttons_2( $buttons ) { // source: http://wpsnipp.com/index.php/functions-php/creating-custom-styles-drop-down-in-tinymce/
  array_unshift( $buttons, 'styleselect' );
  return $buttons;
}
add_filter( 'mce_buttons_2', 'themeit_mce_buttons_2' );
function themeit_tiny_mce_before_init( $settings ) {
  $settings['theme_advanced_blockformats'] = 'p,a,div,span,h1,h2,h3,h4,h5,h6,tr,';
  $style_formats = array(
      array( 'title' => 'Button',         'inline' => 'span',  'classes' => 'button' ),
      array( 'title' => 'Green Button',   'inline' => 'span',  'classes' => 'button button-green' ),
      array( 'title' => 'Rounded Button', 'inline' => 'span',  'classes' => 'button button-rounded' ),
      array( 'title' => 'Other Options' ),
      array( 'title' => '&frac12; Col.',      'block'    => 'div',  'classes' => 'one-half' ),
      array( 'title' => '&frac12; Col. Last', 'block'    => 'div',  'classes' => 'one-half last' ),
      array( 'title' => 'Callout Box',        'block'    => 'div',  'classes' => 'callout-box' ),
      array( 'title' => 'Highlight',          'inline'   => 'span', 'classes' => 'highlight' )
  );
  $settings['style_formats'] = json_encode( $style_formats );
  return $settings;
}
add_filter( 'tiny_mce_before_init', 'themeit_tiny_mce_before_init' );

// -- disable self ping
// TODO: Pluginize
// source: http://wpsnipp.com/index.php/functions-php/disable-self-pings-with-pre_ping-hook/

function no_self_ping( &$links ) {
    $home = get_option( 'home' );
    foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, $home ) )
            unset($links[$l]);
}
add_action( 'pre_ping', 'no_self_ping' );

// -- debug stats
// TODO: Make optional
// source http://wpsnipp.com/index.php/functions-php/display-db-queries-time-spent-and-memory-consumption/

function performance( $visible = false ) {
    $stat = sprintf(  '%d queries in %.3f seconds, using %.2fMB memory',
        get_num_queries(),
        timer_stop( 0, 3 ),
        memory_get_peak_usage() / 1024 / 1024
        );
    echo $visible ? $stat : "<!-- {$stat} -->" ;
}
add_action( 'wp_footer', 'performance', 20 );


    function ljpl_bootstrap_comment($comment, $args, $depth) {
    
       $GLOBALS['comment'] = $comment; ?>
       
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        	<div class="comment-meta">
        		<?php echo get_avatar( $comment ); ?>
        		<div class="comment-author"><?php printf(__('%s'), get_comment_author_link()) ?></div>
        		<div class="comment-date"><?php echo get_comment_date('j.m.Y');?> <?php echo get_comment_time('H:i:s'); ?></div>
    		</div>
                
           
            <div class="comment-body">	         
            
		        <?php if ($comment->comment_approved == '0') : ?>
		            <em><php _e('Your comment is awaiting moderation.') ?></em><br />
		        <?php endif; ?>
		        
		        <?php comment_text(); ?>
		        
		        <div class="reply">
		            <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		        </div>
	        </div>
        
<?php } 

add_filter('get_avatar','change_avatar_css');

function change_avatar_css($class) {
$class = str_replace("class='avatar", "class='avatar img-circle author_gravatar alignright_icon ", $class) ;
return $class;
}
