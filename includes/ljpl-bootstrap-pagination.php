<?php

function ljpl_bootstrap_archive_pagination() {
	global $wp_query;
	echo '<nav class="pagination pagination-centered">';
	$big = 999999999; // need an unlikely integer
	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
		'type' => 'list'
	) );
	echo '</nav>';
}

function ljpl_bootstrap_single_pagination( $args = '' ) {
	$defaults = array(
		'before'           => '<p>' . __( 'Pages:' ), 'after' => '</p>',
		'link_before'      => '', 'link_after' => '',
		'next_or_number'   => 'number', 'nextpagelink' => __( 'Next page' ),
		'previouspagelink' => __( 'Previous page' ), 'pagelink' => '%',
		'echo'             => 1
	);

	$r = wp_parse_args( $args, $defaults );
	$r = apply_filters( 'wp_link_pages_args', $r );
	extract( $r, EXTR_SKIP );

	global $page, $numpages, $multipage, $more, $pagenow;

	$output = '';
	if ( $multipage ) {
		if ( 'number' == $next_or_number ) {
			$output .= $before;
			$output .= '<ul>';
			for ( $i = 1; $i < ( $numpages + 1 ); $i = $i + 1 ) {
				$j = str_replace( '%', $i, $pagelink );
				if ( ( $i == $page )) {
					$output .= '<li class="disabled">';
				} else {
					$output .= '<li>';
				}
					$output .= _wp_link_page( $i );
				$output .= $link_before . $j . $link_after;
					$output .= '</a>';
			}
			$output .= '</li>';
			$output .= $after;
		} else {
			if ( $more ) {
				$output .= $before;
				$i = $page - 1;
				if ( $i && $more ) {
					$output .= _wp_link_page( $i );
					$output .= $link_before . $previouspagelink . $link_after . '</a>';
				}
				$i = $page + 1;
				if ( $i <= $numpages && $more ) {
					$output .= _wp_link_page( $i );
					$output .= $link_before . $nextpagelink . $link_after . '</a>';
				}
				$output .= '</ul>';
				$output .= $after;
			}
		}
	}

	if ( $echo )
		echo $output;

	return $output;
}
