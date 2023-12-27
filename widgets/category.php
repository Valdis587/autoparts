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

class Caregory_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */

    function __construct() {
        parent::__construct(
            'caregory_widget', // Base ID
            esc_html__( 'Категории темы', 'smarkets' ), // Name
            array( 'description' => 'A Views Widget' ) // Args
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
    public function widget( $args, $instance )
    {
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        } ?>
        <div class="sidebar__wiget-body">
            <ul class="sidebar__wiget-caregory-list">
                    <?php
                    $terms = get_terms( array(
                        'taxonomy' => 'product_cat',
                        'hide_empty' => true,
                        'pad_counts'=> true,
                        'orderby' => 'name',
                        'parent' => 0
                    ) );
                    $item=0;
                    if($terms) {
                        foreach($terms as $term) {
                            $item++;
                            // Создаем массив терминов детей текущего термина текущей таксономии
                            $tax = $term->taxonomy;
                            $children_terms = get_terms( array(
                                'taxonomy' => $tax,
                                'hide_empty' => true,
                                'parent' => $term->term_id
                            ) );
                            if($children_terms) { ?>
                                <li class="sidebar__sub-category"><a href="javascript:void(0);"><?php echo $term->name;?><i class="icon-angle-down"></i></a>
                                    <ul class="sidebar__sub-menu">
                                        <?php foreach ($children_terms as $children_term) { ?>
                                            <li><a  href="<?php echo get_category_link($children_term->term_id);?>"><?php echo $children_term->name; ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } else { ?>
                                <li><a href="<?php echo get_category_link($term->term_id);?>"><?php echo $term->name;?></a></li>
                            <?php } } } ?>
                </ul>
                            </div>

        <?php    echo $args['after_widget'];

    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Категории ', 'smarkets' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Категории', 'smarkets' ); ?></label>
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
function register_сaregory_widget() {
    register_widget( 'Caregory_Widget' );
}
add_action( 'widgets_init', 'register_сaregory_widget' );