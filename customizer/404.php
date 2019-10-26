<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    STARTER_SLUG . '_error404',
    array(
        'title'            => __( 'Страница ошибки 404', STARTER_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Якорь #error404', STARTER_TEXTDOMAIN ),
        'panel'            => STARTER_SLUG
    )
); /**/



$wp_customize->add_setting(
    STARTER_SLUG . '_error404_title',
    array(
        'default'           => __( 'Ошибка 404', STARTER_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    STARTER_SLUG . '_error404_title',
    array(
        'section'           => STARTER_SLUG . '_error404',
        'label'             => __( 'Заголовок', STARTER_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    STARTER_SLUG . '_error404_description',
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_textarea_field',
    )
);
$wp_customize->add_control(
    STARTER_SLUG . '_error404_description',
    array(
        'section'           => STARTER_SLUG . '_error404',
        'label'             => __( 'Подзаголовок', STARTER_TEXTDOMAIN ),
        'type'              => 'textarea',
    )
); /**/


