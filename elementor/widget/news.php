<?php

namespace WPC\Widgets;


use Elementor\Widget_Base;
use Elementor\Controls_Manager;


if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}


class News extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'news';
    }

    public function get_title()
    {
        return esc_html__('Новости', 'smarkets');
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
                'label' => __('Новости', 'smarkets'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Новости', 'smarkets'),
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
            'bur_title3',
            [
                'label' => __('Кнопка', 'smarkets'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Читать далее', 'smarkets'),
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
                'max' => 4,
                'step' => 1,
                'default' => 3,
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
                'default' => 3,
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

        $this->add_control(
            'button-color-autor',
            [
                'label' => esc_html__( 'Цвет автор', 'smarkets' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ff2d37',
                'selectors' => [
                    '{{WRAPPER}} .blog-home .blog-external .infos .media-author' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button-color',
            [
                'label' => esc_html__( 'Цвет конопки', 'smarkets' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#222222',
                'selectors' => [
                    '{{WRAPPER}} .blog-home .blog-external .readmore a' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .blog-home .blog-external .readmore a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();


    }
protected function render()
{
$settings = $this->get_settings_for_display(); ?>
    <div class="module so-latest-blog blog-home">
        <?php if($settings['cat_title2']) { ?>
            <div class="pre_text">
                <?php echo $settings['cat_title2']; ?>
            </div>
        <?php } ?>
        <?php if($settings['cat_title1']) { ?>
            <h3 class="modtitle"><span><?php echo $settings['cat_title1']; ?></span></h3>
        <?php } ?>
        <div class="modcontent clearfix">
            <div class="so-blog-external buttom-type1 button-type1">
                <div id="news" class="blog-external yt-content-slider contentslider" data-hoverpause="<?php echo $settings['hoverpause']; ?>" data-rtl="yes" data-pagination="no"  data-autoplay="<?php echo $settings['autoplay']; ?>" data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="<?php echo $settings['column1200']; ?>" data-items_column0="<?php echo $settings['column900']; ?>" data-items_column1="<?php echo $settings['column768']; ?>" data-items_column2="<?php echo $settings['column480']; ?>" data-items_column3="<?php echo $settings['column0']; ?>" data-items_column4="<?php echo $settings['column0']; ?>" data-lazyload="yes" data-loop="yes" data-buttonpage="top">
    <?php
    $params = array(
        'posts_per_page' => 10// этот параметр не обязателен, так как get_posts() по умолчанию и так выводит 5 постов
    );
    $news= new \WP_Query($params);

    if ($news->have_posts() ) : ?>
        <?php while ( $news->have_posts() ) : $news->the_post(); ?>
            <div class="media">
                <div class="item head-button">
                    <div class="media-left so-block">
                        <?php
                        $id = get_post_thumbnail_id();
                        $main=wp_get_attachment_image_src( $id, 'news-home' );
                        ?>
                        <a class="imag" href="<?php the_permalink(); ?>"><img src="<?php echo $main[0]; ?>" width="<?php echo $main[1]; ?>" height="<?php echo $main[2]; ?>" alt="<?php the_title(''); ?>" /></a>
                    </div>
                    <div class="media-body">
                        <div class="media-content so-block">
                            <div class="infos"><span class="media-date-added"> <?php the_date(); ?></span>Автор: <span class="media-author"><?php the_author(); ?></span></div>
                            <h4 class="media-heading font-title head-item">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(''); ?>" target="_self"><?php the_title(''); ?></a>
                            </h4>
                            <div class="readmore font-title">
                                <a href="<?php the_permalink(); ?>" target="_self"><span><?php echo $settings['bur_title3']; ?></span> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
<?php }

}