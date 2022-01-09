<?php

namespace WPC\Widgets;


use Elementor\Widget_Base;
use Elementor\Controls_Manager;


if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}


class Title extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'title';
    }

    public function get_title()
    {
        return esc_html__('Заголовок', 'smarkets');
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
                'label' => __('Заголовок', 'smarkets'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Заголовок', 'smarkets'),
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

    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>
             <div style="margin-bottom: 10px" class="module extra-layout3">
            <?php if($settings['cat_title2']) { ?>
                <div class="pre_text">
                    <?php echo $settings['cat_title2']; ?>
                </div>
            <?php } ?>
            <?php if($settings['cat_title1']) { ?>
                <h3 class="modtitle"><span><?php echo $settings['cat_title1']; ?></span></h3>
            <?php } ?>
        </div>

  <?php  }
}