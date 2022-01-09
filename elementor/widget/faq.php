<?php

namespace WPC\Widgets;


use Elementor\Widget_Base;
use Elementor\Controls_Manager;


if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}


class Faq extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'faq';
    }

    public function get_title()
    {
        return esc_html__('Вопрос ответ', 'smarkets');
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
                'label' => __('Вопрос ответ', 'smarkets'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Вопрос ответ', 'smarkets'),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'slider_title',
            [
                'label' => __('Вопрос', 'smarkets'),
                'default' => __('Вопрос', 'smarkets'),
            ]
        );

        $repeater->add_control(
            'faq',
            [
                'label' => esc_html__( 'Ответ', 'smarkets' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'row' => 10,
                'placeholder' => esc_html__( 'Type your description here', 'smarkets' ),
            ]
        );

        $this->add_control(
            'faq-slider',
            [
                'label' => __('Вопрос ответ', 'smarkets'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'show_label' => true,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'slider_title' => __('Вопрос', 'smarkets'),
                        'faq' => __('Ответ', 'smarkets'),

                    ],

                    [
                        'slider_title' => __('Вопрос', 'smarkets'),
                        'faq' => __('Ответ', 'smarkets'),

                    ],

                    [
                        'slider_title' => __('Вопрос', 'smarkets'),
                        'faq' => __('Ответ', 'smarkets'),

                    ],

                ],
                'title_field' => '{{{ slider_title }}}',
            ]
        );
        $this->end_controls_section();

    }
protected function render() {
$settings = $this->get_settings_for_display(); ?>
    <div class="col-sm-12">
        <ul class="yt-accordion">

    <?php
    foreach (  $settings['faq-slider'] as $item ) { ?>
            <li class="accordion-group">
                <h3 class="accordion-heading"><i class="fa fa-plus-square"></i><span><?php echo $item['slider_title']; ?></span></h3>
                <div class="accordion-inner">
                    <p>
                        <?php echo $item['faq']; ?>
                    </p>
                </div>
            </li>
        <?php } ?>
        </ul>
    </div>
<?php  }
}