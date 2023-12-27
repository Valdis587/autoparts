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
        'title'      => esc_html__( 'Оплата', 'your-textdomain-here' ),
        'id'         => 'paypal',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'pay1',
                'type'     => 'media',
                'title'    => esc_html__( 'Оплата 1', 'your-textdomain-here' ),
                'url'      => false,
                'preview'  => true,
                'default'      => array(
                    'url'    => get_template_directory_uri() . '/assets/images/payments/1.png',
                ),
            ),
            array(
                'id'       => 'pay2',
                'type'     => 'media',
                'title'    => esc_html__( 'Оплата 2', 'your-textdomain-here' ),
                'url'      => false,
                'preview'  => true,
                'default'      => array(
                    'url'    => get_template_directory_uri() . '/assets/images/payments/2.png',
                ),
            ),
            array(
                'id'       => 'pay3',
                'type'     => 'media',
                'title'    => esc_html__( 'Оплата 3', 'your-textdomain-here' ),
                'url'      => false,
                'preview'  => true,
                'default'      => array(
                    'url'    => get_template_directory_uri() . '/assets/images/payments/3.png',
                ),
            ),
            array(
                'id'       => 'pay4',
                'type'     => 'media',
                'title'    => esc_html__( 'Оплата 4', 'your-textdomain-here' ),
                'url'      => false,
                'preview'  => true,
                'default'      => array(
                    'url'    => get_template_directory_uri() . '/assets/images/payments/4.png',
                ),
            ),
            array(
                'id'       => 'pay5',
                'type'     => 'media',
                'title'    => esc_html__( 'Оплата 5', 'your-textdomain-here' ),
                'url'      => false,
                'preview'  => true,
                'default'      => array(
                    'url'    => get_template_directory_uri() . '/assets/images/payments/5.png',
                ),
            ),
            array(
				'id'       => 'copy',
				'type'     => 'text',
				'title'    => esc_html__( 'Авторские права', 'your-textdomain-here' ),
				'default'  => '© 2023',
			),
        ),
    )
);