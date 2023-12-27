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
        'title'      => esc_html__( 'Быстрый просмотр', 'your-textdomain-here' ),
        'id'         => 'quick',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'quick-on',
                'type'     => 'switch',
                'title'    => esc_html__( 'Быстрый просмотр Вкл/Выкл', 'your-textdomain-here' ),
                'default'  => true,
            ),
        
        ),
        )
    );