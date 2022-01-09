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


require get_template_directory() . '/functions/scripts.php';
require get_template_directory() . '/functions/setting.php';
require get_template_directory() . '/functions/menu-cat.php';
require get_template_directory() . '/functions/menu-footer.php';
require get_template_directory() . '/functions/breadcrumbs.php';
require get_template_directory() . '/functions/paginations.php';
require get_template_directory() . '/functions/sidebar.php';
require get_template_directory() . '/plugins/tgm/example.php';
require get_template_directory() . '/functions/menu-primary.php';
require get_template_directory() . '/includes/admin/admin.php';
require get_template_directory() . '/includes/admin/sample/config.php';
require get_template_directory() . '/widget/cat-news.php';
require get_template_directory() . '/widget/archive-news.php';
require get_template_directory() . '/widget/tag-news.php';

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
    require get_template_directory() . '/elementor/config.php';
    require get_template_directory() . '/woocommerce/include/remove-hook.php';
    require get_template_directory() . '/woocommerce/include/add-hook-cat.php';
    require get_template_directory() . '/woocommerce/include/add-hook-prod.php';
    require get_template_directory() . '/woocommerce/include/woo-breadcrumbs.php';
    require get_template_directory() . '/woocommerce/include/shop-sidebar.php';
    require get_template_directory() . '/woocommerce/include/admin.php';
    require get_template_directory() . '/woocommerce/include/quick.php';
    require get_template_directory() . '/woocommerce/include/count.php';
    require get_template_directory() . '/woocommerce/include/catalog.php';
    require get_template_directory() . '/woocommerce/include/billing.php';
    require get_template_directory() . '/widget/category.php';
    require get_template_directory() . '/widget/tag-prod.php';
    require get_template_directory() . '/widget/hit-prod.php';
    require get_template_directory() . '/widget/new-prod.php';
    require get_template_directory() . '/widget/sale-prod.php';
    require get_template_directory() . '/widget/rating-prod.php';
    //require get_template_directory() . '/widget/prosm-prod.php';
    require get_template_directory() . '/widget/featured.php';
    require get_template_directory() . '/inc/woocommerce.php';
}

