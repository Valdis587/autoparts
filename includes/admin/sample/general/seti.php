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
        'title'            => esc_html__( 'Соцсети', 'your-textdomain-here' ),
        'id'               => 'seti',
        'subsection'       => true,
        'customizer_width' => '700px',
        'fields'           => array(
            array(
                'id'       => 'seti-on',
                'type'     => 'switch',
                'title'    => esc_html__( 'Соцсети Вкл/Выкл', 'your-textdomain-here' ),
                'default'  => true,
            ),
            array(
                'id'       => 'fb',
                'type'     => 'text',
                'title'    => esc_html__( 'Facebook', 'your-textdomain-here' ),
                'default'  => '#',
            ),
            array(
                'id'       => 'tw',
                'type'     => 'text',
                'title'    => esc_html__( 'Twitter', 'your-textdomain-here' ),
                'default'  => '#',
            ),
            array(
                'id'       => 'ok',
                'type'     => 'text',
                'title'    => esc_html__( 'Odnoklassniki', 'your-textdomain-here' ),
                'default'  => '#',
            ),
            array(
                'id'       => 'vk',
                'type'     => 'text',
                'title'    => esc_html__( 'VKontakte', 'your-textdomain-here' ),
                'default'  => '#',
            ),
            array(
                'id'       => 'in',
                'type'     => 'text',
                'title'    => esc_html__( 'Instagram', 'your-textdomain-here' ),
                'default'  => '#',
            ),
        ),
    )
);
