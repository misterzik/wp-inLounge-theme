<?php
/**
 * @package LeChaTeau
 */

/**
 * @param array $classes Classes for the body element.
 * @return array
 */

function inLoungeTheme_body_classes( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'inLoungeTheme_body_classes' );
