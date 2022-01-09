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

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function auto_part_widgets_init2() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Сайдбар магазина', 'auto-part' ),
            'id'            => 'shop-sidebar-autoparts',
            'description'   => esc_html__( 'Add widgets here.', 'auto-part' ),
            'before_widget' => '<div id="%1$s" class="module category-style %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="modtitle">',
            'after_title'   => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'auto_part_widgets_init2' );