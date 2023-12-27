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

class LastNews_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */

    function __construct() {
        parent::__construct(
            'lastnews_widget', // Base ID
            esc_html__( 'Последние новости', 'smarkets' ), // Name
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
        }

        $query_args = array(
            'posts_per_page' => 3,
            'no_found_rows'  => 1,
            'post_status'    => 'publish',
            'post_type'      => 'post',
            'orderby'  => 'post__in',
        );


        $r = new WP_Query( $query_args  );
        global $autoparts;

        if ( $r->have_posts() ) {
            ?>
<div class="sidebar__wiget-body">
    <ul class="sidebar__wiget-news-list">
                    <?php
                    while ( $r->have_posts() ) {
                        global $product;
                        $r->the_post(); ?>
                     <li class="sidebar__wiget-news-item">
                         <?php
                         $id = get_post_thumbnail_id();
                         $main=wp_get_attachment_image_src( $id, 'last-blog' );
                         ?>
                         <div class="sidebar__wiget-news-img">
                         <a href="<?php the_permalink(); ?>"><img src="<?php echo $main[0]; ?>" alt="<?php the_title(''); ?>"></a>
                    </div>
                     <a href="<?php the_permalink(); ?>" class="sidebar__wiget-news-title"><?php the_title(''); ?></a>
                    </li>
                   <?php } ?>
                    </ul>
 </div>
        <?php }   wp_reset_postdata();  echo $args['after_widget'];

    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Последние новости', 'smarkets' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Последние новости', 'smarkets' ); ?></label>
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
function register_lastnews_widget() {
    register_widget( 'LastNews_Widget' );
}
add_action( 'widgets_init', 'register_lastnews_widget' );