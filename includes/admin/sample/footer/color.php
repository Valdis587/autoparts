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
        'id'         => 'color-footer',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'footer-top-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Фон иконок соцсетей подвала', 'your-textdomain-here' ),
                'default'  => '#ff2d37',
                'validate' => 'color',
                'output'   => array(
                    'background-color' => '.typefooter-2 .row-dark, .typefooter-2 .box-footer .modcontent ul.menu li a::before',
                ),
            ),
            array(
                'id'       => 'footer-centr-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Фон центральной части подвала', 'your-textdomain-here' ),
                'default'  => '#181818',
                'validate' => 'color',
                'output'   => array(
                    'background-color' => '.typefooter-2',
                ),
            ),
            array(
                'id'       => 'footer-bottom-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Фон нижней части подвала', 'your-textdomain-here' ),
                'default'  => '#111111',
                'validate' => 'color',
                'output'   => array(
                    'background-color' => '.typefooter-2 .footer-bottom',
                ),
            ),

            array(
                'id'       => 'footer-icon-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Цвет иконок и элементов меню', 'your-textdomain-here' ),
                'default'  => '#ff2d37',
                'validate' => 'color',
                'output'   => array(
                    'color' => '.typefooter-2 .box-infos .list-icon li .icon, .typefooter-2 .box-footer .modcontent ul.menu li a:hover',
                ),
            ),
            array(
                'id'       => 'footer-title-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Цвет заголовков меню', 'your-textdomain-here' ),
                'default'  => '#ffffff',
                'validate' => 'color',
                'output'   => array(
                    'color' => '.typefooter-2 .module .modtitle',
                ),
            ),
        ),
    )
);