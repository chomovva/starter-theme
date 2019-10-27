<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<?php get_template_part( 'parts/head' ); ?>
	<body <?php body_class(); ?> data-nav="inactive">
		<div class="wrapper" id="wrapper">
			<header class="wrapper__item wrapper__item--header header" id="header">
				<div class="container">
					<?php
						printf(
							'<%1$s class="blogname"><a href="%3$s">%2$s</a></%1$s>',
							( is_front_page() ) ? 'h1' : 'div',
							get_bloginfo( 'name', 'raw' ),
							home_url( '/' )
						);
					?>
					<p class="blogdescription"><?php bloginfo( 'description' ); ?></p>
				</div>
			</header>
			<?php
				if ( has_nav_menu( 'main' ) )  wp_nav_menu( array(
					'theme_location'  => 'main',
					'menu'            => 'main',
					'container'       => 'nav',
					'container_class' => 'wrapper__item wrapper__item--nav nav',
					'container_id'    => 'nav',
					'menu_class'      => 'nav__list list',
					'menu_id'         => '',
					'echo'            => true,
					'depth'           => 1,
				) );
			?>
			<main class="wrapper__item wrapper__item--main main" id="main">