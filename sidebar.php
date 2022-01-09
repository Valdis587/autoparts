<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AutoParts
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside class="col-md-3 col-sm-4 col-xs-12 content-aside left_column " id="column-left">
	<?php dynamic_sidebar( 'sidebar-autoparts' ); ?>
</aside><!-- #secondary -->
