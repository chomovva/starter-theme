<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<?php get_template_part( 'parts/head' ); ?>
	<body <?php body_class(); ?>>
		<div class="wrap">

			<?php

				$title = get_theme_mod( STARTER_SLUG . '_error404_title', __( 'Ошибка 404', STARTER_TEXTDOMAIN ) );
				$description = get_theme_mod( STARTER_SLUG . '_error404_description', __( 'Страница не найдена', STARTER_TEXTDOMAIN ) );
				if ( function_exists( 'pll__' ) ) {
					$title = pll__( $title );
					$description = pll__( $description );
				}

			?>

			<h1><?php echo $title; ?></h1>
			<p><?php echo $description; ?></p>
			<p><a class="btn btn-warning" href="<?php echo home_url( '/' ); ?>"><?php _e( 'На главную', STARTER_TEXTDOMAIN ); ?></a></p>

		</div>
		<?php wp_footer(); ?>
	</body>
</html>