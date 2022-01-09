<?php

namespace WPC\Widgets;


use Elementor\Widget_Base;
use Elementor\Controls_Manager;


if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}


class SaleProd extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'saleprod';
    }

    public function get_title()
    {
        return esc_html__('Товары со скидкой', 'smarkets');
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
                'label' => __('Товары со скидкой', 'smarkets'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Товары со скидкой', 'smarkets'),
            ]
        );

        $this->add_control(
            'cat_title2',
            [
                'label' => __('Слоган сверху', 'smarkets'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Слоган сверху', 'smarkets'),
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


        $this->add_control(
            'column1200',
            [
                'label' => esc_html__('Сolumn >> 1200', 'smarkets'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'step' => 1,
                'default' => 5,
            ]
        );

        $this->add_control(
            'column900',
            [
                'label' => esc_html__('Сolumn >> 900', 'smarkets'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 4,
                'step' => 1,
                'default' => 4,
            ]
        );

        $this->add_control(
            'column768',
            [
                'label' => esc_html__('Сolumn >> 768', 'smarkets'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 4,
                'step' => 1,
                'default' => 2,
            ]
        );

        $this->add_control(
            'column480',
            [
                'label' => esc_html__('Сolumn >> 480', 'smarkets'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 2,
                'step' => 1,
                'default' => 2,
            ]
        );

        $this->add_control(
            'column0',
            [
                'label' => esc_html__('Сolumn >> 0', 'smarkets'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 2,
                'step' => 1,
                'default' => 1,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__('Style', 'elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Маленький заголовок', 'smarkets'),
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .pre_text',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Большой заголовок', 'smarkets'),
                'name' => 'content_typography2',
                'selector' => '{{WRAPPER}} h3.modtitle span',
            ]
        );

        $this->end_controls_section();


    }
    protected function render() {
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
        <div style="margin-bottom: 10px" class="module extra-layout3">
            <?php if($settings['cat_title2']) { ?>
                <div class="pre_text">
                    <?php echo $settings['cat_title2']; ?>
                </div>
            <?php } ?>
            <?php if($settings['cat_title1']) { ?>
                <h3 class="modtitle"><span><?php echo $settings['cat_title1']; ?></span></h3>
            <?php } ?>
            <div class="modcontent">
                <div id="so_extra_slider_12" class="so-extraslider button-type1">
                    <div id="saleprod" class="products-list yt-content-slider extraslider-inner" data-hoverpause="<?php echo $settings['hoverpause']; ?>" data-rtl="yes" data-pagination="no"  data-autoplay="<?php echo $settings['autoplay']; ?>" data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="<?php echo $settings['column1200']; ?>" data-items_column0="<?php echo $settings['column900']; ?>" data-items_column1="<?php echo $settings['column768']; ?>" data-items_column2="<?php echo $settings['column480']; ?>" data-items_column3="<?php echo $settings['column0']; ?>" data-items_column4="<?php echo $settings['column0']; ?>" data-lazyload="yes" data-loop="yes" data-buttonpage="top">
                        <?php
                        foreach ($products as $product) {

                            $post_object = get_post( $product->get_id() );

                            setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
                            $regulare_price=wc_get_price_to_display( $product, array( 'price' => $product->get_regular_price()) );
                            $sale_price=wc_get_price_to_display( $product, array( 'price' => $product->get_sale_price() ) );
                            $percentage = round( ( ( $regulare_price -  $sale_price ) / $regulare_price ) * 100 );
                            if($percentage) {
                                wc_get_template( 'home-slider.php');
                            } }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php  }
}