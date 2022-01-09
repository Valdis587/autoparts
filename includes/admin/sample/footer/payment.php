<?php
/**
 * Redux Framework text config.
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
    $opt_name,
    array(
        'title'            => esc_html__( 'Информация', 'your-textdomain-here' ),
        'id'               => 'info',
        'subsection'       => true,
        'customizer_width' => '700px',
        'fields'           => array(
            array(
                'id'       => 'payment',
                'type'     => 'media',
                'title'    => esc_html__( 'Системы оплаты', 'smarkets' ),
                'url'      => false,
                'preview'  => true,
                'default'      => array(
                    'url'    => get_template_directory_uri() . '/image/catalog/demo/payment/payment.png',
                ),
            ),
            array(
                'id'       => 'copy',
                'type'     => 'text',
                'title'    => esc_html__( 'Авторские права', 'your-textdomain-here' ),
                'default'  => 'Autoparts © 2022',
            ),
        ),
    )
);