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
        'id'         => 'color-shop',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'filter-list-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Фон кнопки (List/Grid) активная', 'your-textdomain-here' ),
                'default'  => '#ff2d37',
                'validate' => 'color',
                'output'   => array(
                    'background' => '.filters-panel .list-view button.btn:hover, .filters-panel .list-view button.btn.active',
                    'border-color' => '.filters-panel .list-view button.btn:hover, .filters-panel .list-view button.btn.active',
                ),
            ),
            array(
                'id'       => 'add-to-cart-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Фон кнопки (В корзину на странице товара)', 'your-textdomain-here' ),
                'default'  => '#ff2d37',
                'validate' => 'color',
                'output'   => array(
                    'background' => '.left-content-product .content-product-right .box-info-product .cart button',
                ),
            ),
            array(
                'id'       => 'tab-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Цвет заголовка описания', 'your-textdomain-here' ),
                'default'  => '#ff2d37',
                'validate' => 'color',
                'output'   => array(
                    'color' => '.producttab .tabsslider.vertical-tabs ul.nav-tabs li.active a',
                    'background-color' => '.producttab .tabsslider.vertical-tabs ul.nav-tabs li.active::before',
                ),
            ),
            array(
                'id'       => 'quikw-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Фон кнопки быстрый просмотр', 'your-textdomain-here' ),
                'default'  => '#ff2d37',
                'validate' => 'color',
                'output'   => array(
                    'background' => '.products-list.grid .product-item-container .left-block .quickview, .products-list .product-grid .product-item-container .left-block .quickview, 
                    .products-list.grid .product-item-container .left-block .quickview:hover, .products-list .product-grid .product-item-container .left-block .quickview:hover
                    ',
                ),
            ),
            array(
                'id'       => 'filter-price-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Цвет фильтра по цене', 'your-textdomain-here' ),
                'default'  => '#878787',
                'validate' => 'color',
                'output'   => array(
                    'background' => '.widget_price_filter .ui-slider .ui-slider-range, .widget_price_filter .ui-slider .ui-slider-handle, .ui-slider .ui-slider-handle::before',
                ),
            ),
            array(
                'id'       => 'filter-price-color-but',
                'type'     => 'color',
                'title'    => esc_html__( 'Цвет кнопки фильтра по цене', 'your-textdomain-here' ),
                'default'  => '#878787',
                'validate' => 'color',
                'output'   => array(
                    'background' => '.main-filter-but',
                ),
            ),
            array(
                'id'       => 'filter-price-color-but-hover',
                'type'     => 'color',
                'title'    => esc_html__( 'Цвет кнопки фильтра по цене при наведениии', 'your-textdomain-here' ),
                'default'  => '#ff2d37',
                'validate' => 'color',
                'output'   => array(
                    'background' => '.main-filter-but:hover',
                ),
            ),
        ),
    )
);