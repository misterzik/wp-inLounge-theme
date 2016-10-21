<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package inLoungeTheme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
