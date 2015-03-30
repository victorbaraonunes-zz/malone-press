
<?php get_header() ?>

	<section id="home">

		<div class="slideshow">
			
			<?php query_posts('post_type=slideshow&order=asc'); ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<?php the_post_thumbnail('slideshow') ?>

			<?php endwhile; endif; ?>

		</div>

		<div class="slide-prev"></div>
		<div class="slide-next"></div>

		<div class="gmaps" data-latitude="-25.099425" data-longitude="-50.158322" data-title="Ponta Grossa, Paraná, Brazil"></div>

	</section>

<?php get_footer() ?>
