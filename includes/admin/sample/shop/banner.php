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
        'title'      => esc_html__( 'Баннер', 'your-textdomain-here' ),
        'id'         => 'banner-media',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'banner-on',
                'type'     => 'switch',
                'title'    => esc_html__( 'Баннер Вкл/Выкл', 'your-textdomain-here' ),
                'default'  => true,
            ),
            array(
                'id'       => 'banner-link',
                'type'     => 'text',
                'title'    => esc_html__( 'Ссылка баннера', 'your-textdomain-here' ),
                'default'  => '#',
            ),
            array(
                'id'       => 'banner',
                'type'     => 'media',
                'title'    => esc_html__( 'Баннер', 'smarkets' ),
                'url'      => false,
                'preview'  => true,
                'default'      => array(
                    'url'    => get_template_directory_uri() . '/image/theme/img-cate.jpg',
                ),
            ),
        ),
    )
);