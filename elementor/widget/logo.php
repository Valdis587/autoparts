<?php

namespace WPC\Widgets;


use Elementor\Widget_Base;
use Elementor\Controls_Manager;


if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}


class Logo extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'logo';
    }

    public function get_title()
    {
        return esc_html__('Карусель логотипов', 'smarkets');
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
                'label' => __('Лого', 'smarkets'),
                'default' => __('Лого', 'smarkets'),
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
                        'slider_title' => __('Лого', 'smarkets'),
                        'slider_image' => __('Slide', 'smarkets'),

                    ],

                    [
                        'slider_title' => __('Лого', 'smarkets'),
                        'slider_image' => __('Slide', 'smarkets'),

                    ],

                    [
                        'slider_title' => __('Лого', 'smarkets'),
                        'slider_image' => __('Slide', 'smarkets'),

                    ],

                    [
                        'slider_title' => __('Лого', 'smarkets'),
                        'slider_image' => __('Slide', 'smarkets'),

                    ],


                    [
                        'slider_title' => __('Лого', 'smarkets'),
                        'slider_image' => __('Slide', 'smarkets'),

                    ],

                    [
                        'slider_title' => __('Лого', 'smarkets'),
                        'slider_image' => __('Slide', 'smarkets'),

                    ],

                ],
                'title_field' => '{{{ slider_title }}}',
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


        $this->add_control(
            'column1200',
            [
                'label' => esc_html__('Сolumn >> 1200', 'smarkets'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 6,
                'step' => 1,
                'default' => 6,
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
                    '{{WRAPPER}} .slider-brands .owl2-nav .slick-arrow:hover, .slider-brands .owl2-nav .owl2-prev:hover, .slider-brands .owl2-nav .owl2-next:hover' => 'background-color: {{VALUE}}; border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

    }
protected function render() {
$settings = $this->get_settings_for_display(); ?>
    <div class="row-brands">
        <div class="slider-brands container">
            <div id="logo" class="yt-content-slider contentslider" data-arrows="<?php echo $settings['arrows']; ?>" data-hoverpause="<?php echo $settings['hoverpause']; ?>" data-rtl="yes" data-pagination="no"  data-autoplay="<?php echo $settings['autoplay']; ?>" data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="<?php echo $settings['column1200']; ?>" data-items_column0="<?php echo $settings['column900']; ?>" data-items_column1="<?php echo $settings['column768']; ?>" data-items_column2="<?php echo $settings['column480']; ?>" data-items_column3="<?php echo $settings['column0']; ?>" data-items_column4="<?php echo $settings['column0']; ?>" data-lazyload="yes" data-loop="yes" data-buttonpage="top">
 <?php
        foreach (  $settings['theme-slider'] as $item ) { ?>
            <div class="item"><a href="#"><img src="<?php echo $item['slider_image']['url']; ?>" alt="<?php echo bloginfo('name'); ?>"></a></div>
<?php } ?>
        </div>
    </div>
<?php }
}