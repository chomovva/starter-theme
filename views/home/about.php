<section class="section about">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<img class="lazy" src="#" data-src="<?php echo esc_attr( $thumbnail_src ); ?>" alt="<?php echo esc_attr( $thumbnail_alt ); ?>">
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 first-sm">
				<h2><?php echo $title; ?></h2>
				<div class="content">
					<?php echo $content; ?>
				</div>
				<p>
					<a class="permalink" href="<?php echo esc_attr( $permalink ); ?>"><?php _e( 'Подробней', STARTER_TEXTDOMAIN ); ?></a>
				</p>
			</div>
		</div>
	</div>
</section>