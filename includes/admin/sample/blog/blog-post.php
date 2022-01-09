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
        'title'            => esc_html__( 'Страница новостей', 'your-textdomain-here' ),
        'id'               => 'blog-news',
        'subsection'       => true,
        'customizer_width' => '700px',
        'fields'           => array(
            array(
                'id'       => 'blog-but-text',
                'type'     => 'text',
                'title'    => esc_html__( 'Текст кнопки', 'your-textdomain-here' ),
                'default'  => 'Читать далее',
            ),
        ),
    )
);