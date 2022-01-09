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
        'title'      => esc_html__( 'Бейджики', 'your-textdomain-here' ),
        'id'         => 'badges',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'badges-on',
                'type'     => 'switch',
                'title'    => esc_html__( 'Бейджики Вкл/Выкл', 'your-textdomain-here' ),
                'default'  => true,
            ),
            array(
                'id'       => 'badges-hit',
                'type'     => 'text',
                'title'    => esc_html__( 'Бейджик "Hit"', 'your-textdomain-here' ),
                'default'  => 'Хит',
            ),
            array(
                'id'       => 'badges-new',
                'type'     => 'text',
                'title'    => esc_html__( 'Бейджик "New"', 'your-textdomain-here' ),
                'default'  => 'Новый',
            ),
            array(
                'id'       => 'color-sale',
                'type'     => 'color',
                'title'    => esc_html__( 'Цвет бейджика скидки', 'your-textdomain-here' ),
                'default'  => '#ff2d37',
                'validate' => 'color',
                'output'   => array(
                    'background-color' => '.label-product-sale, .label-sale',
                    'border-right-color' => '.label-product-sale::before, .label-sale::before',
                ),
            ),
            array(
                'id'       => 'color-new',
                'type'     => 'color',
                'title'    => esc_html__( 'Цвет бейджика новый товар', 'your-textdomain-here' ),
                'default'  => '#3599ff',
                'validate' => 'color',
                'output'   => array(
                    'background-color' => '.label-product-new, .label-new',
                    'border-left-color' => '.label-product-new::before, .label-new::before',
                ),
            ),
            array(
                'id'       => 'color-hit',
                'type'     => 'color',
                'title'    => esc_html__( 'Цвет бейджика хит продаж', 'your-textdomain-here' ),
                'default'  => '#0d9109',
                'validate' => 'color',
                'output'   => array(
                    'background-color' => '.label-product-hit, .label-hit',
                    'border-left-color' => '.label-product-hit::before, .label-hit::before',
                ),
            ),

        ),
    )
);