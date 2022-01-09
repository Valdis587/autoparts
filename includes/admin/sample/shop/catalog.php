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
        'title'      => esc_html__( 'Каталог', 'your-textdomain-here' ),
        'id'         => 'catalog',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'catalog-on',
                'type'     => 'switch',
                'title'    => esc_html__( 'Режим каталога Вкл/Выкл', 'your-textdomain-here' ),
                'default'  => false,
            ),
            array(
                'id'       => 'mail-cat',
                'type'     => 'text',
                'title'    => esc_html__( 'Почта для отправки сообщений', 'your-textdomain-here' ),
                'default'  => 'info@autoprts.ru',
            ),
        ),
    )
);