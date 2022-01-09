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
        'title'      => esc_html__( 'Логотип', 'your-textdomain-here' ),
        'id'         => 'logo-media',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'logo',
                'type'     => 'media',
                'title'    => esc_html__( 'Logo', 'smarkets' ),
                'url'      => false,
                'preview'  => true,
                'default'      => array(
                    'url'    => get_template_directory_uri() . '/image/catalog/logo.png',
                ),
            ),
        ),
    )
);