
<?php if ( ! defined( 'ABSPATH' ) ) { exit; }; ?>

<h1><?php the_archive_title(); ?></h1>
<?php starter\the_breadcrumb(); ?>

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<div class="archive__entry entry">
			<div class="row center-xs">
				<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
					<a class="entry__thumbnail thumbnail" href="<?php the_permalink(); ?>">
						<?php starter\the_thumbnail_image( get_the_ID(), 'medium' ); ?>
					</a>
				</div>
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
					<h3 class="entry__title title"><?php the_title(); ?></h3>
					<div class="entry__excerpt excerpt"><?php the_excerpt(); ?></div>
					<p class="text-right">
						<a class="entry__permalink permalink" href="<?php the_permalink(); ?>"><?php _e( 'Подробней', STARTER_TEXTDOMAIN ); ?></a>
					</p>
				</div>
			</div>
		</div>

	<?php endwhile; ?>

	<?php the_posts_pagination(); ?>

<?php endif; ?>