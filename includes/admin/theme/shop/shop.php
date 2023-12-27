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
        'title'      => esc_html__( 'Картинки магазина', 'your-textdomain-here' ),
        'id'         => 'loop-img',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'loop-img-width',
                'type'     => 'text',
                'title'    => esc_html__( 'Ширина', 'your-textdomain-here' ),
                'default'  => '200',
            ),
            array(
                'id'       => 'loop-img-height',
                'type'     => 'text',
                'title'    => esc_html__( 'Высота', 'your-textdomain-here' ),
                'default'  => '200',
            ),
        ),
        )
    );