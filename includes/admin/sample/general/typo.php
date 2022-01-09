<?php
/**
 * Redux Framework typography config.
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

Redux::set_section(
    $opt_name,
    array(
        'title'  => esc_html__( 'Шрифты', 'your-textdomain-here' ),
        'id'     => 'typo',
        'icon'   => 'el el-font',
        'fields' => array(
            array(
                'id'                => 'typog-body',
                'type'              => 'typography',
                'title'             => esc_html__( 'Шрифт тег  <body>', 'your-textdomain-here' ),
                'google'            => true,
                'font_family_clear' => false,
                'default'           => array(
                    'color'       => '#878787',
                    'font-size'   => '14px',
                    'font-family' => 'Rubik, sans-serif',
                    'font-weight' => 'Normal',
                ),
                'output'            => array( 'body' ),
            ),
        ),
    )
);
