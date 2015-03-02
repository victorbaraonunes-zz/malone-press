
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

	</section>

<?php get_footer() ?>
