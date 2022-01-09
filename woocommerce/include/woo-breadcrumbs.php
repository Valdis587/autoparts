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

function woocommerce_breadcrumb2( $args = array() ) {
    $args = wp_parse_args(
        $args,
        apply_filters(
            'woocommerce_breadcrumb_defaults2',
            array(
                'wrap_before' => ' <ul class="breadcrumb">',
                'wrap_after'  => '</ul>',
                'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
            )
        )
    );

    $breadcrumbs = new WC_Breadcrumb();

    if ( ! empty( $args['home'] ) ) {
        $breadcrumbs->add_crumb( $args['home'], apply_filters( 'woocommerce_breadcrumb_home_url', home_url() ) );
    }

    $args['breadcrumb'] = $breadcrumbs->generate();

    /**
     * WooCommerce Breadcrumb hook
     *
     * @hooked WC_Structured_Data::generate_breadcrumblist_data() - 10
     */
    do_action( 'woocommerce_breadcrumb2', $breadcrumbs, $args );

    wc_get_template( 'global/breadcrumb2.php', $args );
}