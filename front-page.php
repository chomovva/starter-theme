<?php


get_header();


foreach ( array(
    'about',
) as $key ) {
    if ( get_theme_mod( STARTER_SLUG . "_{$key}_flag", false ) )
        get_template_part( "parts/home/$key" );
}



get_footer();