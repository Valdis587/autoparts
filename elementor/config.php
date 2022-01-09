<?php

namespace WPC;

use Carbon_Fields\Widget;

if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}

class Widget_Loader  {
    private static $_instance= null;
    public static function instance() {
        if(is_null(self::$_instance)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    private function include_widgets_files() {
        require_once (get_template_directory() . '/elementor/widget/title.php');
        require_once (get_template_directory() . '/elementor/widget/slider.php');
        require_once (get_template_directory() . '/elementor/widget/slider-rev.php');
        require_once (get_template_directory() . '/elementor/widget/cat-prod.php');
        require_once (get_template_directory() . '/elementor/widget/new-prod.php');
        require_once (get_template_directory() . '/elementor/widget/hit-prod.php');
        require_once (get_template_directory() . '/elementor/widget/sale-prod.php');
        require_once (get_template_directory() . '/elementor/widget/rating-prod.php');
        require_once (get_template_directory() . '/elementor/widget/featured.php');
        require_once (get_template_directory() . '/elementor/widget/cat-carusel.php');
        require_once (get_template_directory() . '/elementor/widget/testi.php');
        require_once (get_template_directory() . '/elementor/widget/news.php');
        require_once (get_template_directory() . '/elementor/widget/logo.php');
        require_once (get_template_directory() . '/elementor/widget/action.php');
        require_once (get_template_directory() . '/elementor/widget/faq.php');
        require_once (get_template_directory() . '/elementor/widget/stena-cat.php');

    }
    public function register_widgets() {
        $this->include_widgets_files();
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Title());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Slider());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\SliderRev());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\ProdCatSlider());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\NewProd());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\HitProd());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\SaleProd());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\RatingProd());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Featured());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\CatCarusel());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Testi());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\News());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Logo());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Action());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Faq());
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Stena());
    }
    public function __construct() {
        add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets'], 99);
    }
}

Widget_Loader:: instance();

namespace Elementor;
function category_elementor_init(){
    Plugin::instance()->elements_manager->add_category(
        'autoparts',
        [
            'title'  => 'AutoParts',
            'icon' => 'font'
        ],
        1
    );
}
add_action('elementor/init', 'Elementor\category_elementor_init');