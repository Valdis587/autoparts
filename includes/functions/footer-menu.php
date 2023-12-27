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
			'footer-menu1' => esc_html__( 'Меню футера 1', 'flipmarts' ),
		)
	);

function theme_footer_menu1() {
    wp_nav_menu([
        'theme_location'  => 'footer-menu1',
        'menu'            => 'footer-menu1',
        'container'       => false,
        'menu_class'      => 'footer__menu-list',
    ]);
}

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'footer-menu2' => esc_html__( 'Меню футера 2', 'flipmarts' ),
		)
	);

function theme_footer_menu2() {
    wp_nav_menu([
        'theme_location'  => 'footer-menu2',
        'menu'            => 'footer-menu2',
        'container'       => false,
        'menu_class'      => 'footer__menu-list',
    ]);
}

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'footer-menu3' => esc_html__( 'Меню футера 3', 'flipmarts' ),
		)
	);

function theme_footer_menu3() {
    wp_nav_menu([
        'theme_location'  => 'footer-menu3',
        'menu'            => 'footer-menu3',
        'container'       => false,
        'menu_class'      => 'footer__menu-list',
    ]);
}