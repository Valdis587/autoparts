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
        'title'      => esc_html__( 'Счетчик Яндекс Гугл', 'your-textdomain-here' ),
        'id'         => 'matrika',
        'subsection' => true,
        'fields'     => array(
            array(
				'id'       => 'yandex',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Яндекс метрика', 'your-textdomain-here' ),
				'default'  => '',
			),
            array(
				'id'       => 'google',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Гугл аналитика', 'your-textdomain-here' ),
				'default'  => '',
			),
        ),
        )
    );