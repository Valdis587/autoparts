<?php

namespace WPC\Widgets;


use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;


if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}


class SliderRev extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'sliderrev';
    }

    public function get_title()
    {
        return esc_html__('Слайдер Rev', 'smarkets');
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
                'label' => __('Слоган', 'smarkets'),
                'default' => __('Слоган', 'smarkets'),
            ]
        );



        $repeater->add_control(
            'slider_title2',
            [
                'label' => esc_html__( 'Слоган 2', 'smarkets' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'row' => 10,
                'placeholder' => esc_html__( 'Type your description here', 'smarkets' ),
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

        $repeater->add_control(
            'slider_title_button',
            [
                'label' => __('Заголовок кнопки', 'smarkets'),
                'default' => __('Подробнее', 'smarkets'),
            ]
        );
        $repeater->add_control(
        'slider_title_button_link',
        [
            'label' => __('Ссылка кнопки', 'smarkets'),
            'default' => __('#', 'smarkets'),
        ]
    );
        $repeater->add_control(
            'slider_title_button_class',
            [
                'label' => __('Класс кнопки', 'smarkets'),
                'placeholder' => __('.main-class', 'smarkets'),
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
                        'slider_title' => __('Заголовок', 'smarkets'),
                        'slider_image' => __('Slide', 'smarkets'),

                    ],

                    [
                        'slider_title' => __('Заголовок', 'smarkets'),
                        'slider_image' => __('Slide', 'smarkets'),

                    ],

                ],
                'title_field' => '{{{ slider_title }}}',
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
            'title1-sl',
            [
                'label' => esc_html__( 'Цвет первого слогана', 'smarkets' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .rev-title2' => 'color: {{VALUE}}',
                ],
            ]
        );


        $this->add_control(
            'title2-sl',
            [
                'label' => esc_html__( 'Цвет второго слогана', 'smarkets' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .rev-text2' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'arrow-back',
            [
                'label' => esc_html__( 'Цвет кнопки при наведении стрелки', 'smarkets' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ff2d37',
                'selectors' => [
                    '{{WRAPPER}} .btn-custom-2:hover' => 'background-color: {{VALUE}}; border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'opacity',
            [
                'label' => esc_html__( 'Opacity', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1,
                        'min' => 0.10,
                        'step' => 0.01,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #slider-rev-container ' => 'opacity: {{SIZE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Css_Filter::get_type(),
            [
                'name' => 'css_filters',
                'selector' => '{{WRAPPER}} #slider-rev-container',
            ]
        );


        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display(); ?>
        <section id="content">
                        <div id="slider-rev-container">
                            <div id="slider-rev">
                                <ul>
        <?php
        foreach (  $settings['theme-slider'] as $item ) { ?>

            <li data-transition="random" data-slotamount="6" data-masterspeed="600"  data-saveperformance="on"  data-title="Learn More">
                <img class="sl-image-main" src="<?php echo $item['slider_image']['url']; ?>"  alt="<?php echo bloginfo('name'); ?>" data-lazyload="<?php echo $item['slider_image']['url']; ?>" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
                <div  class="tp-caption rev-title2 sfr str" data-x="75" data-y="230" data-speed="600" data-start="400" data-endspeed="200"><?php echo $item['slider_title']; ?></div>
                <div class="tp-caption rev-text2 sfr str" data-x="75" data-y="283" data-speed="600" data-start="700" data-endspeed="400"><?php echo $item['slider_title2']; ?></div>
                <div class="tp-caption sfr str" data-x="75" data-y="355" data-speed="600" data-start="1000" data-endspeed="600">
                    <?php if($item['slider_title_button']) { ?>
                    <a href="<?php echo $item['slider_title_button_link']; ?>" class="btn btn-custom-2 <?php echo $item['slider_title_class']; ?>"><?php echo $item['slider_title_button']; ?></a>
                    <?php } ?>
                </div>
            </li>
            <?php } ?>
                                </ul>
                </div>
            </div>
        </section>
        <?php
    }



}