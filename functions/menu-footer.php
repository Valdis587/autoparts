<?php
/**
 * AutoParts functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AutoParts
 */

if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}

// This theme uses wp_nav_menu() in one location.
register_nav_menus(
    array(
        'menu-left' => esc_html__( 'Левое меню подвала', 'auto-part' ),
    )
);

function AutoParts_menu_left() {
    wp_nav_menu([
        'theme_location'  => 'menu-left',
        'menu'            => 'left',
        'container'       => 'div',
        'container_class'       => 'modcontent',
        'menu_class'      => 'menu',
    ]);
}

// This theme uses wp_nav_menu() in one location.
register_nav_menus(
    array(
        'menu-center' => esc_html__( 'Центральное меню подвала', 'auto-part' ),
    )
);

function AutoParts_menu_center() {
    wp_nav_menu([
        'theme_location'  => 'menu-center',
        'menu'            => 'center',
        'container'       => 'div',
        'container_class'       => 'modcontent',
        'menu_class'      => 'menu',
    ]);
}


// This theme uses wp_nav_menu() in one location.
register_nav_menus(
    array(
        'menu-right' => esc_html__( 'Правое меню подвала', 'auto-part' ),
    )
);

function AutoParts_menu_right() {
    wp_nav_menu([
        'theme_location'  => 'menu-right',
        'menu'            => 'right',
        'container'       => 'div',
        'container_class'       => 'modcontent',
        'menu_class'      => 'menu',
    ]);
}