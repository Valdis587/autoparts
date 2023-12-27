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

class WC_Widget_Recently_Viewed_theme extends WC_Widget {

    /**
     * Constructor.
     */
    public function __construct() {
        $this->widget_cssclass    = 'woocommerce widget_recently_viewed_products';
        $this->widget_id          = 'woocommerce_recently_viewed_products';
        $this->widget_name        = __( 'Просмотренные товары', 'woocommerce' );
        $this->settings           = array(
            'title'  => array(
                'type'  => 'text',
                'std'   => __( 'Просмотренные товары', 'woocommerce' ),
                'label' => __( 'Просмотренные товары', 'woocommerce' ),
            ),
            'number' => array(
                'type'  => 'number',
                'step'  => 1,
                'min'   => 1,
                'max'   => 15,
                'std'   => 10,
                'label' => __( 'Number of products to show', 'woocommerce' ),
            ),
        );

        parent::__construct();
    }

    /**
     * Output widget.
     *
     * @see WP_Widget
     * @param array $args     Arguments.
     * @param array $instance Widget instance.
     */
    public function widget( $args, $instance ) {
        $viewed_products = ! empty( $_COOKIE['woocommerce_recently_viewed'] ) ? (array) explode( '|', wp_unslash( $_COOKIE['woocommerce_recently_viewed'] ) ) : array(); // @codingStandardsIgnoreLine
        $viewed_products = array_reverse( array_filter( array_map( 'absint', $viewed_products ) ) );

        if ( empty( $viewed_products ) ) {
            return;
        }

        ob_start();

        $number = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : $this->settings['number']['std'];

        $query_args = array(
            'posts_per_page' => $number,
            'no_found_rows'  => 1,
            'post_status'    => 'publish',
            'post_type'      => 'product',
            'post__in'       => $viewed_products,
            'orderby'        => 'post__in',
        );

        if ( 'yes' === get_option( 'woocommerce_hide_out_of_stock_items' ) ) {
            $query_args['tax_query'] = array(
                array(
                    'taxonomy' => 'product_visibility',
                    'field'    => 'name',
                    'terms'    => 'outofstock',
                    'operator' => 'NOT IN',
                ),
            ); // WPCS: slow query ok.
        }

        $r = new WP_Query( apply_filters( 'woocommerce_recently_viewed_products_widget_query_args', $query_args ) );

        if ( $r->have_posts() ) {

            $this->widget_start( $args, $instance );
                ?>
           
                  <ul class="shop__sidebar-carousel product-grid owl-carousel owl-theme">
               <?php
            $template_args = array(
                'widget_id' => isset( $args['widget_id'] ) ? $args['widget_id'] : $this->widget_id,
            );

            while ( $r->have_posts() ) {
                $r->the_post();
                wc_get_template_part('content', 'product');
            } ?>
            </ul>
        

            <?php
            $this->widget_end( $args );
        }

        wp_reset_postdata();

        $content = ob_get_clean();

        echo $content; // WPCS: XSS ok.
    }
}

// register Foo_Widget widget
function register_viewed_widget() {
    register_widget( 'WC_Widget_Recently_Viewed_theme' );
}
add_action( 'widgets_init', 'register_viewed_widget' );