<?php
/**
 * Redux Framework switch config.
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
    $opt_name,
    array(
        'title'      => esc_html__( 'Счетчик акций', 'your-textdomain-here' ),
        'id'         => 'count',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'count-on',
                'type'     => 'switch',
                'title'    => esc_html__( 'Счетчик акций Вкл/Выкл', 'your-textdomain-here' ),
                'default'  => false,
            ),
            array(
				'id'       => 'count-background',
				'type'     => 'color',
				'title'    => esc_html__( 'Цвет счетчика ', 'your-textdomain-here' ),
				'default'  => '#E67E22',
				'transparent' => false,
				'validate' => 'color',
				'output'   => array(
					'background-color' => '.product__count',
				),
			),
        ),
    )
);