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
        return esc_html__('Заголовок темы', 'smarkets');
    }


    public function get_categories()
    {
        return ['theme'];
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
            'flipmarts_title',
            [
                'label' => __('Заголовок', 'smarkets'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Заголовок', 'smarkets'),
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>
        <div class="container">
<h3 class="sitetitle"><span><?php echo $settings['flipmarts_title'];  ?></span></h3>
    </div>
    <?php }

}