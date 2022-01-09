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
        'title'            => esc_html__( '404', 'your-textdomain-here' ),
        'id'               => '404-y',
        'subsection'       => true,
        'customizer_width' => '700px',
        'fields'           => array(
            array(
                'id'       => '404-text',
                'type'     => 'text',
                'title'    => esc_html__( 'Текст страницы 404', 'your-textdomain-here' ),
                'default'  => 'Страница не найдена!',
            ),
        ),
    )
);