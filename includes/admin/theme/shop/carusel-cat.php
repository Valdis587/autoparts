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
        'title'      => esc_html__( 'Карусель категорий', 'your-textdomain-here' ),
        'id'         => 'carusel-cat',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'carusel-cat-on',
                'type'     => 'switch',
                'title'    => esc_html__( 'Карусель категорий Вкл/Выкл', 'your-textdomain-here' ),
                'default'  => true,
            ),
        ),
    )
);