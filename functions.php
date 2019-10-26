<?php


define( 'STARTER_URL', get_template_directory_uri() . '/' );
define( 'STARTER_DIR', get_template_directory() . '/' );
define( 'STARTER_TEXTDOMAIN', 'starter' );
define( 'STARTER_VERSION', '3.0.0' );
define( 'STARTER_SLUG', 'starter' );




get_template_part( 'includes/enqueue' );
get_template_part( 'includes/template-functions' );
get_template_part( 'includes/gutenberg' );




/**
 * Регистрация переводов строк
 */
if ( function_exists( 'pll_register_string' ) ) {
	include get_theme_file_path( 'includes/register-strings.php' );
}



/**
 * Регистрация настроек кастомайзера
 */
if ( is_customize_preview() ) {
	add_action( 'customize_register', function ( $wp_customize ) {
		$wp_customize->add_panel(
			STARTER_SLUG,
			array(
				'capability'      => 'edit_theme_options',
				'title'           => __( 'Настройки Стартовой темы', STARTER_TEXTDOMAIN ),
				'priority'        => 200
			)
		);
		include get_theme_file_path( 'customizer/home/about.php' );
		include get_theme_file_path( 'customizer/404.php' );
	} );
}




function starter_theme_supports() {
	add_theme_support( 'menus' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_filter( 'widget_text', 'do_shortcode' );
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'after_setup_theme', 'starter_theme_supports' );



/**
 * Загрузка "переводов"
 */
function starter_load_textdomain() {
	load_theme_textdomain( STARTER_TEXTDOMAIN, STARTER_DIR . 'languages/' );
}
add_action( 'after_setup_theme', 'starter_load_textdomain' );



/**
 * Регистрация меню
 */
function resume_register_nav_menus() {
	register_nav_menus( array(
		'main'      => __( 'Главное меню', STARTER_TEXTDOMAIN ),
	) );
}
add_action( 'after_setup_theme', 'resume_register_nav_menus' );




/**
 * Регистрация "сайдбаров"
 */
function starter_register_sidebars() {
	register_sidebar( array(
		'name'             => __( 'Колонка', STARTER_TEXTDOMAIN ),
		'id'               => 'column',
		'description'      => '',
		'class'            => '',
		'before_widget'    => '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div id="%1$s" class="widget %2$s">',
		'after_widget'     => '</div></div>',
		'before_title'     => '<h3 class="widget__title">',
		'after_title'      => '</h3>',
	) );
}
add_action( 'widgets_init', 'starter_register_sidebars' );





/**
 * Редирект на запись со страницы поиска, если найдена всего одна запись
 */
function starter_single_result(){  
	if( ! is_search() ) return;
	global $wp_query;
	if( $wp_query->post_count == 1 ) {  
		wp_redirect( get_permalink( reset( $wp_query->posts )->ID ) );
		die;
	}  
}
add_action( 'template_redirect', 'starter_single_result' );