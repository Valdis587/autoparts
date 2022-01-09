<?php
/**
 * Market functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Market
 */

if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}

class Hit_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */

    function __construct() {
        parent::__construct(
            'hit_widget', // Base ID
            esc_html__( 'Хит продаж AutoParts', 'smarkets' ), // Name
            array( 'description' => 'A New Widget' ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        ob_start();

        //$number = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : $this->settings['number']['std'];

        $query_args = array(
            'posts_per_page' => 40,
            'no_found_rows'  => 1,
            'post_status'    => 'publish',
            'post_type'      => 'product',
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

        $r = new WP_Query( $query_args  );

        if ( $r->have_posts() ) {
            ?>
            <div style="width: 280px;" class="related titleLine products-list grid module ">
                            <!-- Begin extraslider-inner -->
                <div  class="releate-products yt-content-slider products-list" data-rtl="no" data-loop="yes" data-autoplay="yes" data-autoheight="no" data-autowidth="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="1" data-items_column0="1" data-items_column1="1" data-items_column2="1" data-items_column3="1" data-items_column4="1" data-arrows="no" data-pagination="yes" data-lazyload="yes" data-hoverpause="yes">
                                <?php
                                while ( $r->have_posts() ) {
                                    $r->the_post();
                                    $template_args = array('widget_id' => isset( $args['widget_id'] ) ? $args['widget_id'] : $this->widget_id, );
                                    $hit = get_post_meta( get_the_ID(), 'hit_badge', true );
                                    if($hit=='yes') {
                                        wc_get_template( 'slider-widget.php', $template_args );
                                    } } ?>
                            </div>
                        </div>
            <!--end-->
            <?php
            wp_reset_postdata();
            echo $args['after_widget'];
        } }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Хит продаж ', 'smarkets' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Хит продаж ', 'smarkets' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

        return $instance;
        //   echo $args['after_widget'];

    }

} // class Foo_Widget

// register Foo_Widget widget
function register_hit_widget() {
    register_widget( 'Hit_Widget' );
}
add_action( 'widgets_init', 'register_hit_widget' );