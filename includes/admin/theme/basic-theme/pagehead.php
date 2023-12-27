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
        'title'      => esc_html__( 'Шапка страниц', 'your-textdomain-here' ),
        'id'         => 'head',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'headimg',
                'type'     => 'media',
                'title'    => esc_html__( 'Картинка', 'your-textdomain-here' ),
                'url'      => false,
                'preview'  => true,
                'default'      => array(
                    'url'    => get_template_directory_uri() . '/assets/images/slider/sl1.jpg',
                ),
            ),
        ),
        )
    );