<?php

namespace WPC\Widgets;


use Elementor\Widget_Base;
use Elementor\Controls_Manager;


if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}


class CatCarusel extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'catcarusel';
    }

    public function get_title()
    {
        return esc_html__('Карусель категорий', 'smarkets');
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
                'label' => __('Карусель категорий', 'smarkets'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Карусель категорий', 'smarkets'),
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
        $this->end_controls_section();


        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__( 'Style', 'elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'arrow-color',
            [
                'label' => esc_html__( 'Цвет стрелки', 'smarkets' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#282828',
                'selectors' => [
                    '{{WRAPPER}} .slider-cates.so-categories .owl2-controls .owl2-nav .slick-arrow::before, .slider-cates.so-categories .owl2-controls .owl2-nav .owl2-prev::before, .slider-cates.so-categories .owl2-controls .owl2-nav .owl2-next::before,
            
                     .slider-cates.so-categories .owl2-controls .owl2-nav .slick-arrow::before, .slider-cates.so-categories .owl2-controls .owl2-nav .owl2-prev::before, .slider-cates.so-categories .owl2-controls .owl2-nav .owl2-next::before' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'arrow-back',
            [
                'label' => esc_html__( 'Цвет фона при наведении стрелки', 'smarkets' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ff2d37',
                'selectors' => [
                    '{{WRAPPER}} .slider-cates.so-categories .owl2-controls .owl2-nav .slick-arrow:hover, .slider-cates.so-categories .owl2-controls .owl2-nav .owl2-prev:hover, .slider-cates.so-categories .owl2-controls .owl2-nav .owl2-next:hover' => 'background-color: {{VALUE}}; border-color: {{VALUE}}',

                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>
        <div style="background-color: #fff" class="row-cates">
            <!-- So categories -->
            <div id="so_categories_31" class="so-categories module theme3 slider-cates container preset01-5 preset02-4 preset03-3 preset04-2 preset05-1">
               <?php if($settings['cat_title2']) { ?>
                <div class="pre_text">
                  <?php echo $settings['cat_title2']; ?>
                </div>
        <?php } ?>
        <?php if($settings['cat_title1']) { ?>
                <h3 class="modtitle"><span><?php echo $settings['cat_title1']; ?></span></h3>
        <?php } ?>
                <div class="modcontent">
                    <div class="cat-wrap theme3">
                        <?php
        $categories = get_terms( 'product_cat' );
        $options = [];
        foreach ( $categories as $category )  { ?>
            <div class="content-box">
                <div class="image-cat">
                    <?php
                    $category_thumbnail = get_term_meta($category->term_id, 'thumbnail_id', true);
                    $image = wp_get_attachment_url($category_thumbnail);
                    ?>
                    <a href="<?php echo get_category_link($category->term_id);?>"><img src="<?php echo $image; ?>" alt="<?php echo $category->name; ?>" /></a>
                </div>
                <div class="cat-title">
                    <a href="<?php echo get_category_link($category->term_id);?>"><?php echo $category->name; ?></a>
                </div>
            </div>
                    <?php  }
                        ?>
                    </div>
                </div>
            </div>
        </div>
   <?php }
}