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
        'id'               => 'menu-foot',
        'subsection'       => true,
        'customizer_width' => '700px',
        'fields'           => array(
            array(
                'id'       => 'left-menu',
                'type'     => 'text',
                'title'    => esc_html__( 'Заголовок левого меню', 'your-textdomain-here' ),
                'default'  => 'Информация',
            ),
            array(
                'id'       => 'centr-menu',
                'type'     => 'text',
                'title'    => esc_html__( 'Заголовок центрального меню', 'your-textdomain-here' ),
                'default'  => 'Мой аккаунт',
            ),
            array(
                'id'       => 'right-menu',
                'type'     => 'text',
                'title'    => esc_html__( 'Заголовок правого меню', 'your-textdomain-here' ),
                'default'  => 'Категории',
            ),

        ),
    )
);