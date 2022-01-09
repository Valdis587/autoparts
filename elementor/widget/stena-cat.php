<?php

namespace WPC\Widgets;


use Elementor\Widget_Base;
use Elementor\Controls_Manager;


if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}


class Stena extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'stena';
    }


    public function get_title()
    {
        return esc_html__('Стена категорий', 'smarkets');
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
            'but_cat_title',
            [
                'label' => __('Кнопка', 'smarkets'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Подробнее', 'smarkets'),
            ]
        );

        $this->add_control(
            'image-cat',
            [
                'label' => esc_html__( 'Choose Image', 'elementor' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $categories = get_terms( 'product_cat' );

        $options = [];
        foreach ( $categories as $category )  {
            $options[$category->term_id] = $category->name;

        }
        $this->add_control(
            'category-select',
            [
                'label' => __( 'Category', 'smarkets' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' =>   $options,
                'label_block' => true,
                'multiple' => true,
                'default' => 'Category',
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

        $this->add_control(
            'button-color',
            [
                'label' => esc_html__( 'Цвет конопки', 'smarkets' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#222222',
                'selectors' => [
                    '{{WRAPPER}} .cates-layout1.so-categories .cat-wrap.theme2 .content-box .viewmore' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button-color-hover',
            [
                'label' => esc_html__( 'Цвет конопки при наведении', 'smarkets' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ff2d37',
                'selectors' => [
                    '{{WRAPPER}} .cates-layout1.so-categories .cat-wrap.theme2 .content-box .viewmore:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }
protected function render()
{
$settings = $this->get_settings_for_display(); ?>
    <div style="padding-top: 20px; padding-bottom: 20px; margin-bottom: 30px" class="row-cates">
    <div id="so_categories_11" class="so-categories module theme2 cates-layout1 container preset01-3 preset02-2 preset03-2 preset04-2 preset05-1">
    <div class="modcontent">
    <div class="cat-wrap theme2">


    <div class="content-box">
                                <div class="inner">
                                    <div class="parent-cat">
                                        <div class="image-cat">
                                            <a href="<?php echo get_category_link($settings['category-select']);?>"><img src="<?php echo $settings['image-cat']['url']?>" alt="<?php echo get_the_category_by_ID($settings['category-select']); ?>" /></a>
                                        </div>
                                    </div>
                                    <div class="cat-title"><a href="<?php echo get_category_link($settings['category-select']);?>"><?php echo get_the_category_by_ID($settings['category-select']); ?></a></div>
                                    <div class="child-cat">
                                         <?php
                                      $children_terms = get_terms( array(
                                     'taxonomy' => 'product_cat',
                                          'hide_empty' => true,
                                     'parent' => $settings['category-select'],
                                          ) );
                                             if($children_terms) {
                                          foreach ($children_terms as $children_term) {
                                          ?>
                                        <div class="child-cat-title"><a href="<?php echo get_category_link($children_term->term_id);?>"><?php echo $children_term->name; ?></a></div>
                                        <?php }  }   ?>
                                        <a class="viewmore" href="<?php echo get_category_link($settings['category-select']);?>"><?php echo $settings['but_cat_title']; ?></a>
                                    </div>
                                </div>
                            </div>
    </div>
    </div>
    </div>
    </div>

<?php }
}