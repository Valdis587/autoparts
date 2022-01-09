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
        'title'      => esc_html__( 'Фавиконка', 'your-textdomain-here' ),
        'id'         => 'fav-media',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'favicon',
                'type'     => 'media',
                'title'    => esc_html__( 'Фавиконка', 'smarkets' ),
                'url'      => false,
                'preview'  => true,
                'default'      => array(
                    'url'    => get_template_directory_uri() . '/ico/favicon-16x16.png',
                ),
            ),
        ),
    )
);