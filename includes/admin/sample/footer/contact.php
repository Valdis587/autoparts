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
        'title'            => esc_html__( 'Контакты', 'your-textdomain-here' ),
        'id'               => 'cont-foot',
        'subsection'       => true,
        'customizer_width' => '700px',
        'fields'           => array(
            array(
                'id'       => 'cont-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Заголовок контактов', 'your-textdomain-here' ),
                'default'  => 'Контакты',
            ),
            array(
                'id'       => 'adress',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Адрес', 'your-textdomain-here' ),
                'default'  => '5611 Wellington Road, Suite 115, Gainesville, VA 20155',
            ),
            array(
                'id'       => 'phone',
                'type'     => 'text',
                'title'    => esc_html__( 'Телефон', 'your-textdomain-here' ),
                'default'  => '8(888)888-88-88',
            ),
            array(
                'id'       => 'email',
                'type'     => 'text',
                'title'    => esc_html__( 'Почта', 'your-textdomain-here' ),
                'default'  => 'info@autoparts.ru',
            ),
            array(
                'id'       => 'time-job',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Время работы', 'your-textdomain-here' ),
                'default'  => '7 Days a week from 10-00 am to 6-00 pm',
            ),
        ),
    )
);