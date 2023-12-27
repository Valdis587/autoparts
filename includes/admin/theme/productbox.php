<?php
/**
 * Redux Framework switch config.
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;


Redux_Metaboxes::set_box(
    $opt_name,
    array(
        'id'         => 'badgik',
        'title'      => esc_html__( 'Бэйджики', 'your-textdomain-here' ),
        'post_types' => array( 'product' ),
        'position'   => 'normal', // normal, advanced, side.
        'priority'   => 'high', // high, core, default, low.
        'sections'   => array(
            array(
                'title'  => esc_html__( 'Бэйджики', 'your-textdomain-here' ),
                'id'     => 'badgik-title',
                'icon'   => 'el-icon-cogs',
                'fields' => array(
                    array(
                        'id'       => 'badgik-new',
                        'type'     => 'checkbox',
                        'title'    => esc_html__( 'Бэйджик Новый товар', 'your-textdomain-here' ),
                        'default'  => false,
                    ),
                    array(
                        'id'       => 'badgik-hit',
                        'type'     => 'checkbox',
                        'title'    => esc_html__( 'Бэйджик Хит продаж', 'your-textdomain-here' ),
                        'default'  => false,
                    ),
                ),
            ),
        ),
    )
);

Redux_Metaboxes::set_box(
    $opt_name,
    array(
        'id'         => 'count',
        'title'      => esc_html__( 'Акции', 'your-textdomain-here' ),
        'post_types' => array( 'product' ),
        'position'   => 'normal', // normal, advanced, side.
        'priority'   => 'default', // high, default, default, low.
        'sections'   => array(
            array(
                'title'  => esc_html__( 'Дата окончания акции', 'your-textdomain-here' ),
                'id'     => 'count-title',
                'icon'   => 'el-icon-cogs',
                'fields' => array(
                    array(
                        'id'       => 'count-year',
                        'type'     => 'text',
                        'title'    => esc_html__( 'Год', 'your-textdomain-here' ),
                        'placeholder'  => '2023',
                    ),
                    array(
                        'id'       => 'count-mons',
                        'type'     => 'text',
                        'title'    => esc_html__( 'Месяц', 'your-textdomain-here' ),
                        'placeholder'  => '4',
                    ),
                    array(
                        'id'       => 'count-day',
                        'type'     => 'text',
                        'title'    => esc_html__( 'День', 'your-textdomain-here' ),
                        'placeholder'  => '10',
                    ),
                ),
            ),
        ),
    )
);



