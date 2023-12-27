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
        'title'      => esc_html__( 'Заголовки', 'your-textdomain-here' ),
        'id'         => 'foot',
        'subsection' => true,
        'fields'     => array(
			array(
				'id'       => 'footer-text',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Текст', 'your-textdomain-here' ),
				'default'  => 'The variety of products available at our store at the moment is vast, but we still continue to widen our assortment. ',
			),
            array(
				'id'       => 'footer-title1',
				'type'     => 'text',
				'title'    => esc_html__( 'Заголовок 1', 'your-textdomain-here' ),
				'default'  => 'Контакты',
			),
            array(
				'id'       => 'footer-title2',
				'type'     => 'text',
				'title'    => esc_html__( 'Заголовок 2', 'your-textdomain-here' ),
				'default'  => 'Страницы',
			),
            array(
				'id'       => 'footer-title3',
				'type'     => 'text',
				'title'    => esc_html__( 'Заголовок 3', 'your-textdomain-here' ),
				'default'  => 'Служебные',
			),
            array(
				'id'       => 'footer-title4',
				'type'     => 'text',
				'title'    => esc_html__( 'Заголовок 4', 'your-textdomain-here' ),
				'default'  => 'Категории',
			),
        ),
        )
    );