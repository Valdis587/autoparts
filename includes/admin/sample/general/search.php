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
        'title'            => esc_html__( 'Поиск в шапке', 'your-textdomain-here' ),
        'id'               => 'search',
        'subsection'       => true,
        'customizer_width' => '700px',
        'fields'           => array(
            array(
                'id'       => 'search-on',
                'type'     => 'switch',
                'title'    => esc_html__( 'Поиск в шапке Вкл/Выкл', 'your-textdomain-here' ),
                'default'  => true,
            ),
        ),
    )
);
