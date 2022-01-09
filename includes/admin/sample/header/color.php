<?php
/**
 * Redux Framework media config.
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
    $opt_name,
    array(
        'title'      => esc_html__( 'Цвета', 'your-textdomain-here' ),
        'id'         => 'color-head',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'menu-top-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Фон топ меню', 'your-textdomain-here' ),
                'default'  => '#282828',
                'validate' => 'color',
                'output'   => array(
                    'background-color' => '.typeheader-3 .header-top',
                ),
            ),

            array(
                'id'       => 'mini-cart-top-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Цвет мини корзины', 'your-textdomain-here' ),
                'default'  => '#ff2d37',
                'validate' => 'color',
                'output'   => array(
                    'background-color' => '.typeheader-3 .header-bottom, .typeheader-3 .shopping_cart .btn-shopping-cart .top_cart .shopcart-inner .total-shopping-cart .items_cart',
                    'color' => '.typeheader-3 .shopping_cart .btn-shopping-cart .top_cart .shopcart-inner .total-shopping-cart .items_carts',
                ),
            ),

            array(
                'id'       => 'menu-prim-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Фон главного меню', 'your-textdomain-here' ),
                'default'  => '#ff2d37',
                'validate' => 'color',
                'output'   => array(
                    'background-color' => '.typeheader-3 .header-bottom,  .common-home .container-megamenu.horizontal ul.megamenu > li.home > a, .typeheader-3 .container-megamenu.horizontal ul.megamenu > li > a',
                ),
            ),
            array(
                'id'       => 'search-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Цвет кнопки поиска', 'your-textdomain-here' ),
                'default'  => '#ff2d37',
                'validate' => 'color',
                'output'   => array(
                    'background-color' => '.typeheader-3 #sosearchpro .search button, .typeheader-3 #sosearchpro .search button:hover',
                ),
            ),

            array(
                'id'       => 'menu-cat-head',
                'type'     => 'color',
                'title'    => esc_html__( 'Цвет шапки меню категорий', 'your-textdomain-here' ),
                'default'  => '#000000',
                'validate' => 'color',
                'output'   => array(
                    'background' => '.container-megamenu.vertical #menuHeading .megamenuToogle-pattern .container:hover, .typeheader-3 .container-megamenu.vertical #menuHeading .megamenuToogle-pattern .container',
                ),
            ),

            array(
                'id'       => 'menu-cat-drop',
                'type'     => 'color',
                'title'    => esc_html__( 'Цвет выподающего меню категорий при наведении', 'your-textdomain-here' ),
                'default'  => '#ff2d37',
                'validate' => 'color',
                'output'   => array(
                    'background-color' => '.container-megamenu.vertical .vertical-wrapper ul.megamenu > li.active, .container-megamenu.vertical .vertical-wrapper ul.megamenu > li:hover',
                    'border-color' => '.container-megamenu.vertical .vertical-wrapper ul.megamenu > li.active > a, .container-megamenu.vertical .vertical-wrapper ul.megamenu > li:hover > a',
                ),
            ),

        ),
    )
);