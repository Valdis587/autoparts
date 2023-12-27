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
        'title'      => esc_html__( 'Уведомления', 'your-textdomain-here' ),
        'id'         => 'message',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'message-on',
                'type'     => 'switch',
                'title'    => esc_html__( 'Уведомления Вкл/Выкл', 'your-textdomain-here' ),
                'default'  => false,
            ),
            array(
				'id'       => 'message-background',
				'type'     => 'color',
				'title'    => esc_html__( 'Цвет уведомления ', 'your-textdomain-here' ),
				'default'  => '#ffffff',
				'transparent' => false,
				'validate' => 'color',
				'output'   => array(
					'background-color' => '.jGrowl-notification',
				),
			),
            array(
				'id'       => 'message-text',
				'type'     => 'color',
				'title'    => esc_html__( 'Цвет текста уведомления ', 'your-textdomain-here' ),
				'default'  => '#434343',
				'transparent' => false,
				'validate' => 'color',
				'output'   => array(
					'color' => '.messages',
				),
			),
        ),
    )
);