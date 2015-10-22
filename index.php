<?php get_header() ?>
	<section class="page page--home">
		<div class="container">
			<section class="slideshow">
				<?php query_posts('post_type=slideshow&order=asc'); ?>

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php the_post_thumbnail('slideshow') ?>
				<?php endwhile; endif; ?>
			</section>

			<nav class="" role="navigation">
				<a href="#" title="Slide anterior"></a>
				<a href="#" title="Próximo slide"></a>
			</nav>

			<section class="map map--google map--google--js" data-latitude="-25.099425" data-longitude="-50.158322" data-title="Ponta Grossa, Paraná, Brazil"></section>
		</div>
	</section>

<?php get_footer() ?>
