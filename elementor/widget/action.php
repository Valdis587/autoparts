<?php

namespace WPC\Widgets;


use Elementor\Widget_Base;
use Elementor\Controls_Manager;


if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}


class Action extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'action';
    }

    public function get_title()
    {
        return esc_html__('Товары по акции', 'smarkets');
    }


    public function get_categories()
    {
        return ['autoparts'];
    }


    protected function _register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'cat_title1',
            [
                'label' => __('Акция', 'smarkets'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Акция', 'smarkets'),
            ]
        );
        $this->add_control(
            'arrows',
            [
                'label' => esc_html__( 'Стрелки', 'smarkets' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'smarkets' ),
                'label_off' => esc_html__( 'No', 'smarkets' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label' => esc_html__('Autoplay', 'smarkets'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'smarkets'),
                'label_off' => esc_html__('No', 'smarkets'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'hoverpause',
            [
                'label' => esc_html__('Hoverpause', 'smarkets'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'smarkets'),
                'label_off' => esc_html__('No', 'smarkets'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->end_controls_section();

    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $args=array(
            'post_type' => 'product',
            'posts_per_page' => 40,
            'orderby' => 'menu_order',
            'order' => 'DESC',
            'tax_query' => array( array(
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => 'outofstock',
                'operator' => 'NOT IN',
            ) )
        );
        $products = wc_get_products($args); ?>
            <div style="border: none" class="module deals-layout3">
                <h3 class="modtitle2"><span><?php echo $settings['cat_title1']; ?></span></h3>
                <div class="modcontent">
                    <div class="products-list so-deal">
                        <div id="action" class="products-list yt-content-slider extraslider-inner" data-autoplay="<?php echo $settings['autoplay']; ?>"  data-hoverpause="<?php echo $settings['hoverpause']; ?>" data-rtl="yes" data-pagination="no"  data-autoplay="<?php echo $settings['autoplay']; ?>" data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="1" data-items_column0="1" data-items_column1="1" data-items_column2="1" data-items_column3="1" data-items_column4="1" data-lazyload="yes" data-loop="yes" data-buttonpage="top">
                            <?php
                            foreach ($products as $product) {

                                $post_object = get_post( $product->get_id() );

                                setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
                                $day=get_post_meta( get_the_ID(), 'my_meta_key', true );
                                $mon=get_post_meta( get_the_ID(), 'my_meta_key2', true );
                                $year=get_post_meta( get_the_ID(), 'my_meta_key3', true );
                                if ($day && $year && $mon) {
                                    wc_get_template( 'action-slider.php');
                                } }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
  <?php  }

}