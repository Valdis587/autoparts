<?php

namespace WPC\Widgets;


use Elementor\Widget_Base;
use Elementor\Controls_Manager;


if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}


class Testi extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'testi';
    }

    public function get_title()
    {
        return esc_html__('Отзывы', 'smarkets');
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
                'label' => __('Имя', 'smarkets'),
                'default' => __('Имя', 'smarkets'),
            ]
        );

        $repeater->add_control(
            'slider_title2',
            [
                'label' => __('Должность', 'smarkets'),
                'default' => __('Должность', 'smarkets'),
            ]
        );

        $repeater->add_control(
            'testi',
            [
                'label' => esc_html__( 'Отзыв', 'smarkets' ),
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


        $this->add_control(
            'testi-slider',
            [
                'label' => __('Slider', 'smarkets'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'show_label' => true,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'slider_title' => __('Имя', 'smarkets'),
                        'slider_image' => __('Slide', 'smarkets'),

                    ],

                    [
                        'slider_title' => __('Имя', 'smarkets'),
                        'slider_image' => __('Slide', 'smarkets'),

                    ],

                    [
                        'slider_title' => __('Имя', 'smarkets'),
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
            'name-color',
            [
                'label' => esc_html__( 'Цвет имени', 'smarkets' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .clients-slider .client-main .info-content .name-client' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Шрифт имени', 'smarkets'),
                'name' => 'content_typography1',
                'selector' => '{{WRAPPER}} .clients-slider .client-main .info-content .name-client',
            ]
        );

        $this->add_control(
            'job-color',
            [
                'label' => esc_html__( 'Цвет должности', 'smarkets' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ff2d37',
                'selectors' => [
                    '{{WRAPPER}} .clients-slider .client-main .info-content .job-client ' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Шрифт должности', 'smarkets'),
                'name' => 'content_typography2',
                'selector' => '{{WRAPPER}} .clients-slider .client-main .info-content .job-client ',
            ]
        );

        $this->add_control(
            'testi-color',
            [
                'label' => esc_html__( 'Цвет отзыва', 'smarkets' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .clients-slider .client-main .info-content .description-client ' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Шрифт отзыва', 'smarkets'),
                'name' => 'content_typography3',
                'selector' => '{{WRAPPER}} .clients-slider .client-main .info-content .description-client ',
            ]
        );

        $this->add_control(
            'testi-back-color',
            [
                'label' => esc_html__( 'Цвет фона отзыва', 'smarkets' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#282828',
                'selectors' => [
                    '{{WRAPPER}} .clients-slider .client-main .info-content .description-client' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'back-arr-color',
            [
                'label' => esc_html__( 'Цвет фона стрелок при наведении', 'smarkets' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ff2d37',
                'selectors' => [
                    '{{WRAPPER}} .clients-slider .client-main .slick-arrow:hover, .clients-slider .client-main .owl2-prev:hover, .clients-slider .client-main .owl2-next:hover' => 'background-color: {{VALUE}};  border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render() {
           $settings = $this->get_settings_for_display(); ?>
        <div style="margin-top: 0px" class="row-testimonials">
            <div style="margin-top: 0px" class="clients-full">
                    <div class="clients-slider">
                        <div style="width: 100%" class="client-main">
        <?php
        foreach (  $settings['testi-slider'] as $item ) { ?>
            <div class="item">
                <div class="info-content">
                    <div class="name-client"><?php echo $item['slider_title']; ?></div>
                    <div class="job-client"><?php echo $item['slider_title2']; ?></div>
                    <div class="description-client">
                        <?php echo $item['testi']; ?>
                    </div>
                </div>
            </div>
            <?php } ?>
                        </div>
                            <div class="client-image">
        <?php
        foreach (  $settings['testi-slider'] as $item ) { ?>
            <div class="item">
                <div class="image-content">
                    <img src="<?php echo $item['slider_image']['url']; ?>" alt="client">
                </div>
            </div>
            <?php } ?>
                    </div>
                </div>
            </div>
        </div>
<?php }
   }