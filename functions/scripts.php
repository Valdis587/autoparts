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
 * Enqueue scripts and styles.
 */
function auto_part_scripts() {
    wp_enqueue_style( 'auto-part-bootstrap', get_template_directory_uri() . '/css/bootstrap/css/bootstrap.min.css',  _S_VERSION);
    wp_enqueue_style( 'auto-part-font-awesome', get_template_directory_uri() . '/css/font-awesome/css/font-awesome.min.css',  _S_VERSION);
    wp_enqueue_style( 'auto-part-datetimepicker', get_template_directory_uri() . '/js/datetimepicker/bootstrap-datetimepicker.min.css',   _S_VERSION);
    wp_enqueue_style( 'auto-part-owl.carousel', get_template_directory_uri() . '/js/owl-carousel/owl.carousel.css',  _S_VERSION);
    wp_enqueue_style( 'auto-part-slick', get_template_directory_uri() . '/js/slick-slider/slick.css',  _S_VERSION);
    wp_enqueue_style( 'auto-part-lib', get_template_directory_uri() . '/css/themecss/lib.css',  _S_VERSION);
    wp_enqueue_style( 'auto-part-jquery-ui.min', get_template_directory_uri() . '/js/jquery-ui/jquery-ui.min.css',  _S_VERSION);
    wp_enqueue_style( 'auto-part-miniColors', get_template_directory_uri() . '/js/minicolors/miniColors.css',  _S_VERSION);
    wp_enqueue_style( 'auto-part-pe-icon-7-stroke', get_template_directory_uri() . '/js/pe-icon-7-stroke/css/pe-icon-7-stroke.css',  _S_VERSION);
    wp_enqueue_style( 'auto-part-helper', get_template_directory_uri() . '/pe-icon-7-stroke/css/helper.css',  _S_VERSION);
    wp_enqueue_style( 'auto-part-so_searchpro', get_template_directory_uri() . '/css/themecss/so_searchpro.css',  _S_VERSION);
    wp_enqueue_style( 'auto-part-so_megamenu', get_template_directory_uri() . '/css/themecss/so_megamenu.css',  _S_VERSION);
    wp_enqueue_style( 'auto-part-so-categories', get_template_directory_uri() . '/css/themecss/so-categories.css',  _S_VERSION);
    wp_enqueue_style( 'auto-part-so-listing-tabs', get_template_directory_uri() . '/css/themecss/so-listing-tabs.css',  _S_VERSION);
    wp_enqueue_style( 'auto-part-so-category-slider', get_template_directory_uri() . '/css/themecss/so-category-slider.css',  _S_VERSION);
    wp_enqueue_style( 'auto-part-so-deals', get_template_directory_uri() . '/css/themecss/so-deals.css',  _S_VERSION);
    wp_enqueue_style( 'auto-part-so-newletter-popup', get_template_directory_uri() . '/css/themecss/so-newletter-popup.css',  _S_VERSION);
    wp_enqueue_style( 'auto-part-so-latest-blog', get_template_directory_uri() . '/css/themecss/so-latest-blog.css',  _S_VERSION);
  //  wp_enqueue_style( 'auto-part-lib', get_template_directory_uri() . '/css/themecss/lib.css',  _S_VERSION);
    wp_enqueue_style( 'auto-part-footer2', get_template_directory_uri() . '/css/footer/footer2.css',  _S_VERSION);
    wp_enqueue_style( 'auto-part-header3', get_template_directory_uri() . '/css/header/header3.css',  _S_VERSION);
    wp_enqueue_style( 'auto-part-home3', get_template_directory_uri() . '/css/home3.css',  _S_VERSION);
  wp_enqueue_style( 'auto-part-revslider', get_template_directory_uri() . '/css/revslider.css',  _S_VERSION);
    wp_enqueue_style( 'auto-part-responsive', get_template_directory_uri() . '/css/responsive.css',  _S_VERSION);
    wp_enqueue_style( 'auto-part-style', get_stylesheet_uri(), array(), _S_VERSION );


    wp_enqueue_script( 'auto-part-jquery-2.2.4.min', get_template_directory_uri() . '/js/jquery-2.2.4.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'auto-part-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'auto-part-owl.carousel', get_template_directory_uri() . '/js/owl-carousel/owl.carousel.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'auto-part-slick', get_template_directory_uri() . '/js/slick-slider/slick.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'auto-part-libs', get_template_directory_uri() . '/js/themejs/libs.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'auto-part-jquery.unveil', get_template_directory_uri() . '/js/unveil/jquery.unveil.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'auto-part-jquery.countdown.', get_template_directory_uri() . '/js/countdown/jquery.countdown.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'auto-part-count', get_template_directory_uri() . '/js/count.js', array(), _S_VERSION, true );
    wp_localize_script('auto-part-count', 'count', array(
        'url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('count_nonce')
    ));

    wp_enqueue_script( 'auto-part-dcjqaccordion', get_template_directory_uri() . '/js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'auto-part-moment', get_template_directory_uri() . '/js/datetimepicker/moment.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'auto-part-bootstrap-datetimepicker', get_template_directory_uri() . '/js/datetimepicker/bootstrap-datetimepicker.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'auto-part-jquery-ui.min', get_template_directory_uri() . '/js/jquery-ui/jquery-ui.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'auto-part-modernizr', get_template_directory_uri() . '/js/modernizr/modernizr-2.6.2.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'auto-part-miniColors', get_template_directory_uri() . '/js/minicolors/jquery.miniColors.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'auto-part-lightslider', get_template_directory_uri() . '/js/lightslider/lightslider.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'auto-part-application', get_template_directory_uri() . '/js/themejs/application.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'auto-part-homepage', get_template_directory_uri() . '/js/themejs/homepage.js', array(), _S_VERSION, true );

    wp_enqueue_script( 'auto-part-themepunch.tools', get_template_directory_uri() . '/js/jquery.themepunch.tools.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'auto-part-revolution', get_template_directory_uri() . '/js/jquery.themepunch.revolution.min.js', array(), _S_VERSION, true );

    wp_enqueue_script( 'auto-part-elem', get_template_directory_uri() . '/js/elem.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'auto-part-so_megamenu', get_template_directory_uri() . '/js/themejs/so_megamenu.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'auto-part-quick', get_template_directory_uri() . '/js/quick.js', array(), _S_VERSION, true );
    wp_localize_script('auto-part-quick', 'quick', array(
        'url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('quick_nonce')
    ));

    wp_enqueue_script( 'auto-part-catalog', get_template_directory_uri() . '/js/catalog.js', array(), _S_VERSION, true );
    wp_localize_script('auto-part-catalog', 'catalog', array(
        'url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('catalog_nonce')
    ));



    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'auto_part_scripts' );