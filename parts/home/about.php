<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };


$page_id = starter\get_translate_id( get_theme_mod( STARTER_SLUG . '_about_page_id', '' ), 'page' );


if ( ! empty( $page_id ) ) {

    $page = get_post( $page_id, OBJECT, 'raw' );

    if ( $page && ! is_wp_error( $page ) ) {

        $permalink = get_permalink( $page->ID );
        $title = get_theme_mod( STARTER_SLUG . '_about_title', '' );
        $label = get_theme_mod( STARTER_SLUG . '_about_label', __( 'Подробней', STARTER_TEXTDOMAIN ) );
        $thumbnail_src = get_theme_mod( STARTER_SLUG . '_about_thumbnail', '' );

        if ( function_exists( 'pll__' ) ) {
            $title = pll__( $title );
            $label = pll__( $label );
        }

        if ( empty( $title ) ) $title = apply_filters( 'the_title', $page->post_title, $page->ID );

        if ( empty( $thumbnail_src ) ) {
            $thumbnail_src = STARTER_URL . 'images/thumbnail.png';
            $thumbnail_alt = $title;
        } else {
            $thumbnail_alt = wp_get_attachment_caption( attachment_url_to_postid( $thumbnail_src ) );
        }

        $parts = get_extended( $page->post_content );
        $content = do_shortcode( $parts[ 'main' ], false );
        
        include get_theme_file_path( 'views/home/about.php' );

    }

}