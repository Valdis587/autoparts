<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sborka
 */

if ( ! is_active_sidebar( 'sidebar-blog' ) ) {
	return;
}
?>

<aside id="secondary" class="sidebar-theme sidebar">
	<?php dynamic_sidebar( 'sidebar-blog' ); ?>
</aside><!-- #secondary -->
