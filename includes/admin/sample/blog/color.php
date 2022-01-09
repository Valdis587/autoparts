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
        'id'         => 'color-blog',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'sidebar-search-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Цвет кнопки поиска', 'your-textdomain-here' ),
                'default'  => '#ff2d37',
                'validate' => 'color',
                'output'   => array(
                    'background-color' => '.main-search-but, .main-search-but:hover',
                    'border-color' => '.main-search-but, .main-search-but:hover',
                ),
            ),
            array(
                'id'       => 'link-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Цвет кнопки "Читать далее"', 'your-textdomain-here' ),
                'default'  => '#ff2d37',
                'validate' => 'color',
                'output'   => array(
                    'color' => '.blog-listitem .blog-item .blog-item-inner .blog-content .readmore > a',
                ),
            ),
        ),
    )
);