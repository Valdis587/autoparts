<?php
/**
 * woo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package woo
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'category-menu' => esc_html__( 'Меню категорий', 'flipmarts' ),
		)
	);

    
function theme_menu_category() {
    wp_nav_menu([
        'theme_location'  => 'category-menu',
        'menu'            => 'category',
        'container'       => false,
        'menu_class'      => 'header__menu-category-list',
    ]);
}