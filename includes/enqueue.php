<?php


if ( ! defined( 'ABSPATH' ) ) { exit; };




/**
 * Подключение скриптов
 *
 * @param string $handle Имя / идентификатор скрипта
 * @param string $src URL на файл скрипта
 * @param array $deps массив зависимостей
 * @param string|bool $ver версия
 * @param bool $in_footer подключать в шапке или подвале
 */
function starter_scripts() {
	wp_enqueue_script( 'starter-main', STARTER_URL . 'scripts/main.js', array( 'jquery', 'fancybox' ), RESUME_VERSION, true );
	wp_localize_script( 'starter-main', 'StarterTheme', array( 'toTopBtn' => 'Наверх' ) );
	wp_enqueue_script( 'lazyload', STARTER_URL . 'scripts/lazyload.js', array( 'jquery' ), '1.7.6', true );
	wp_enqueue_script( 'fancybox', STARTER_URL . 'scripts/fancybox.js', array( 'jquery' ), '3.3.5', true );
	wp_add_inline_script( 'fancybox', "jQuery( '.fancybox' ).fancybox();", 'after' );
	wp_add_inline_script( 'lazyload', "jQuery( '.lazy' ).lazy();", 'after' );
	wp_enqueue_script( 'superembed', STARTER_URL . 'scripts/superembed.js', array( 'jquery' ), '3.1', true );
}
add_action( 'wp_enqueue_scripts', 'starter_scripts' );






/**
 * Подключение стилей
 *
 * @param string $handle Имя / идентификатор стиля
 * @param string $src URL на файла стиля
 * @param array $deps массив зависимостей
 * @param string|bool $ver версия
 * @param string $media для каких устройств подключать
 */
function starter_styles() {
	wp_enqueue_style( 'starter-main', STARTER_URL . 'styles/main.css', array(), RESUME_VERSION, 'all' );
	// wp_enqueue_style( 'starter-font', 'https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i&amp;display=swap&amp;subset=cyrillic,cyrillic-ext', array(), '14', 'all' );
	wp_enqueue_style( 'fancybox', STARTER_URL . 'styles/fancybox.css', array(), '3.3.5', 'all' );
	wp_enqueue_style( 'slick', STARTER_URL . 'styles/slick.css', array(), '1.8.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'starter_styles', 10, 0 );







function starter_ctitical_styles() {
	if ( file_exists( STARTER_DIR . 'styles/critical.css' ) ) {
		echo '<style type="text/css">' . file_get_contents( STARTER_DIR . 'styles/critical.css' ) . '</style>';
	}
}
add_action( 'wp_head', 'starter_ctitical_styles', 10, 0 );