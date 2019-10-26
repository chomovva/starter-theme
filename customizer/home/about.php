<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    STARTER_SLUG . '_about',
    array(
        'title'            => __( 'Информация', STARTER_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Секция главной страницы. Якорь #about', STARTER_TEXTDOMAIN ),
        'panel'            => STARTER_SLUG
    )
); /**/



$wp_customize->add_setting(
    STARTER_SLUG . '_about_flag',
    array(
        'default'           => false,
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    STARTER_SLUG . '_about_flag',
    array(
        'section'           => STARTER_SLUG . '_about',
        'label'             => __( 'Использовать секцию', STARTER_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/


$wp_customize->add_setting(
    STARTER_SLUG . '_about_page_id',
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    STARTER_SLUG . '_about_page_id',
    array(
        'section'           => STARTER_SLUG . '_about',
        'label'             => __( 'Выбор страницы', STARTER_TEXTDOMAIN ),
        'type'              => 'dropdown-pages',
    )
); /**/



$wp_customize->add_setting(
    STARTER_SLUG . '_about_title',
    array(
        'default'           => __( 'Информация', STARTER_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    STARTER_SLUG . '_about_title',
    array(
        'section'           => STARTER_SLUG . '_about',
        'label'             => __( 'Заголовок', STARTER_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    STARTER_SLUG . '_about_label',
    array(
        'default'           => __( 'Подробней', STARTER_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    STARTER_SLUG . '_about_label',
    array(
        'section'           => STARTER_SLUG . '_about',
        'label'             => __( 'Текст кнопки', STARTER_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    STARTER_SLUG . '_about_thumbnail',
    array(
        'default'           => STARTER_URL . 'images/thumbnail.png',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_url',
    )
);
$wp_customize->add_control(
   new WP_Customize_Image_Control(
       $wp_customize,
       STARTER_SLUG . '_about_thumbnail',
       array(
           'label'      => __( 'Фон', STARTER_TEXTDOMAIN ),
           'section'    => STARTER_SLUG . '_about',
           'settings'   => STARTER_SLUG . '_about_thumbnail'
       )
   )
);

