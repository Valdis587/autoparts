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

class Tag_Woo_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'tag_woo_widget', // Base ID
            esc_html__( 'Атрибуты товаров AutoParts', 'smarkets' ), // Name
            array( 'description' => 'A Tag_Woo Widget' ) // Args
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

        ?>
      <div class="modcontent">
		<div class="box-category">
            <ul id="cat_accordion" class="list-group">
                <?php
                $args1 = array( 'hide_empty' => 0 );
                $terms = get_terms('product_tag', $args1 );
                if($terms) {
                    foreach($terms as $term) { ?>
                        <li><a href="<?php echo get_category_link($term->term_id);?>" class="cutom-parent"><?php echo $term->name;?></a></li>
                    <?php } }  ?>
            </ul>
        </div>
      </div>
        <?php
        echo $args['after_widget'];

        wp_reset_postdata();


    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Атрибуты товаров', 'smarkets'  );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Атрибуты товаров', 'smarkets'  ); ?></label>
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

    }

} // class Foo_Widget

// register Foo_Widget widget
function register_tag_woo_widget() {
    register_widget( 'Tag_Woo_Widget' );
}
add_action( 'widgets_init', 'register_tag_woo_widget' );