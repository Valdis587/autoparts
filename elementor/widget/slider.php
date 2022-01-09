<?php

namespace WPC\Widgets;


use Elementor\Widget_Base;
use Elementor\Controls_Manager;


if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}


class Slider extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'slider';
    }

    public function get_title()
    {
        return esc_html__('Слайдер', 'smarkets');
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
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'slider_title',
            [
                'label' => __('Title', 'smarkets'),
                'default' => __('Title', 'smarkets'),
            ]
        );

        $repeater->add_control(
            'slider_image',
            [
                'label' => __('Slide', 'smarkets'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'theme-slider',
            [
                'label' => __('Slider', 'smarkets'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'show_label' => true,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'slider_title' => __('Title', 'smarkets'),
                        'slider_image' => __('Slide', 'smarkets'),

                    ],

                    [
                        'slider_title' => __('Title', 'smarkets'),
                        'slider_image' => __('Slide', 'smarkets'),

                    ],

                ],
                'title_field' => '{{{ slider_title }}}',
            ]
        );

        $this->add_control(
            'height-slide',
            [
                'label' => esc_html__( 'Height', 'smarkets' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 300,
                ],
                'selectors' => [
                    '{{WRAPPER}} .yt-content-slide' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label' => esc_html__( 'Автопрокрутка', 'smarkets' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'smarkets' ),
                'label_off' => esc_html__( 'No', 'smarkets' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'hoverpause',
            [
                'label' => esc_html__( 'Остановка при наведении', 'smarkets' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'smarkets' ),
                'label_off' => esc_html__( 'No', 'smarkets' ),
                'return_value' => 'yes',
                'default' => 'yes',
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

        $this->end_controls_section();


        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__( 'Style', 'elementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'arrow-back',
            [
                'label' => esc_html__( 'Цвет фона при наведении стрелки', 'smarkets' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ff2d37',
                'selectors' => [
                    '{{WRAPPER}} #content .sohomepage-slider .owl2-controls .owl2-nav .owl2-next:hover, #content .sohomepage-slider .owl2-controls .owl2-nav .owl2-prev:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display(); ?>
        <div  id="content" class="slideshow-full ">
        <div class="box-content1">
            <div style="margin-top: 0px" class="module sohomepage-slider ">
                <div id="home-slider" class="yt-content-slider" data-rtl="yes" data-autoplay="<?php echo $settings['autoplay']; ?>" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column00="1" data-items_column0="1" data-items_column1="1" data-items_column2="1"  data-items_column3="1" data-items_column4="1" data-arrows="<?php echo $settings['arrows']; ?>" data-pagination="no" data-lazyload="yes" data-loop="yes" data-hoverpause="<?php echo $settings['hoverpause']; ?>">
        <?php
        foreach (  $settings['theme-slider'] as $item ) { ?>
                    <div  class="yt-content-slide">
                        <a href="#"><img src="<?php echo $item['slider_image']['url']; ?>" alt="<?php echo bloginfo('name'); ?>" class="img-responsive"></a>
                    </div>
        <?php } ?>

                </div>
            </div>
        </div>
        </div>
        <?php
    }

  

}