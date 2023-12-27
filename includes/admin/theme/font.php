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
		'title'  => esc_html__( 'Шрифт', 'your-textdomain-here' ),
		'id'     => 'typography-site',
		'icon'   => 'el el-font',
		'fields' => array(
			array(
				'id'                => 'font-body',
				'type'              => 'typography',
				'title'             => esc_html__( 'Шрифт', 'your-textdomain-here' ),
				'google'            => true,
				'font_family_clear' => false,
				'default'           => array(
					'color'       => '#434343',
					'font-size'   => '14px',
					'font-family' => 'Roboto',
					'font-weight' => '400',
				),
				'output'            => array( 'body' ),
			),
        ),
        )
    );
    