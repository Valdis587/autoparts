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
        'id'         => 'general-blog',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'sidebar-pagin-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Цвет пагинации', 'your-textdomain-here' ),
                'default'  => '#ff2d37',
                'validate' => 'color',
                'output'   => array(
                    'background-color' => '.pagination > li:first-child > a, .pagination > li:first-child > span, .pagination > li:first-child > a, .pagination > li:first-child > span:hover,
                    .pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover',
                    'border-color' => '.pagination > li:first-child > a, .pagination > li:first-child > span, .pagination > li:first-child > a, .pagination > li:first-child > span:hover,
                    .pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover',
                ),
            ),
            array(
                'id'       => 'sidebar-top-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Фон шапки сайдбара', 'your-textdomain-here' ),
                'default'  => '#ff2d37',
                'validate' => 'color',
                'output'   => array(
                    'background-color' => '.content-aside .module h3.modtitle',
                ),
            ),
            array(
                'id'       => 'title-top-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Цвет маленького заголовка (на главной)', 'your-textdomain-here' ),
                'default'  => '#ff2d37',
                'validate' => 'color',
                'output'   => array(
                    'color' => '.layout-3.common-home #content .module .pre_text',
                ),
            ),
            array(
                'id'       => 'title-glav-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Цвет большого заголовка (на главной)', 'your-textdomain-here' ),
                'default'  => '#000000',
                'validate' => 'color',
                'output'   => array(
                    'color' => '.layout-3.common-home #content .module h3.modtitle span',
                ),
            ),
            array(
                'id'       => 'marker-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Цвет маркера (на главной)', 'your-textdomain-here' ),
                'default'  => '#ff2d37',
                'validate' => 'color',
                'output'   => array(
                    'background-color' => '.layout-3.common-home #content .module h3.modtitle span::before, .layout-3.common-home #content .module h3.modtitle span::after',
                ),
            ),
            array(
                'id'       => 'top-up-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Цвет кнопки вверх при наведении', 'your-textdomain-here' ),
                'default'  => '#ff2d37',
                'validate' => 'color',
                'output'   => array(
                    'background-color' => ' .back-to-top:hover ',
                ),
            ),
            array(
                'id'       => 'pagin-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Цвет пагинации (активный)', 'your-textdomain-here' ),
                'default'  => '#ff2d37',
                'validate' => 'color',
                'output'   => array(
                    'color' => 'ul.breadcrumb li:last-child a, ul.breadcrumb li a:hover',
                ),
            ),
        ),
    )
);