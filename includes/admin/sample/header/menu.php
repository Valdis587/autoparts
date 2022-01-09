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
        'title'            => esc_html__( 'Меню', 'your-textdomain-here' ),
        'id'               => 'menu-head',
        'subsection'       => true,
        'customizer_width' => '700px',
        'fields'           => array(
            array(
                'id'       => 'myaccount',
                'type'     => 'text',
                'title'    => esc_html__( 'Мой аккаунт', 'your-textdomain-here' ),
                'default'  => 'Мой аккаунт',
            ),
            array(
                'id'       => 'cat-on',
                'type'     => 'switch',
                'title'    => esc_html__( 'Меню категорий Вкл/Выкл', 'your-textdomain-here' ),
                'default'  => true,
            ),
            array(
                'id'       => 'menu-categ',
                'type'     => 'text',
                'title'    => esc_html__( 'Заголовок меню категорий', 'your-textdomain-here' ),
                'default'  => 'Категории',
            ),
            array(
                'id'       => 'menu-categ-mob',
                'type'     => 'text',
                'title'    => esc_html__( 'Заголовок меню категорий мобильная версия', 'your-textdomain-here' ),
                'default'  => 'Категории',
            ),

        ),
    )
);