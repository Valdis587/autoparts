<?php
/**
 * sborka functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sborka
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sborka_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'sborka' ),
			'id'            => 'sidebar-blog',
			'description'   => esc_html__( 'Add widgets here.', 'sborka' ),
			'before_widget' => '<section id="%1$s" class="widget sidebar__widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="sidebar__widget-title-wrapp"><h3 class="sidebar__widget-title">',
			'after_title'   => '</h3></div>',
		)
	);
}
add_action( 'widgets_init', 'sborka_widgets_init' );