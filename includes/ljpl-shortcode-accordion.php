<?php

add_shortcode( 'accordion', 'ljpl_bootstrap_shortcode_accordion' );
add_shortcode( 'accordions', 'ljpl_bootstrap_shortcode_accordions' );
remove_filter ('the_content',  'wpautop');

function ljpl_bootstrap_shortcode_accordions( $atts, $content = "" ) {
    extract(shortcode_atts(array(
        'id' => 'accordion-' . get_the_ID()
    ), $atts));
	// return '<div class="accordion" id="' . $id . '">' . do_shortcode($content) . '</div>';
	return '<div class="accordion" id="accordion">' . do_shortcode($content) . '</div>';
}

function ljpl_bootstrap_shortcode_accordion( $atts, $content = "" ) {

    extract(shortcode_atts(array(
        'title' => 'Click to show',
        'parent' => 'accordion-' . get_the_ID(),
        'id' => ''
    ), $atts));
	
	return '
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#' . $parent . '" href="#'.$id.'">
        ' . $title . '
      </a>
    </div>
    <div id="'. $id . '" class="accordion-body collapse"><div class="accordion-inner">' . $content . '</div>
    </div>
  </div>
';
}
