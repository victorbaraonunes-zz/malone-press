		<footer class="footer footer--main">
			<div class="container">
				<div class="vertical-align">
					<p class="vertical-align__item">Executado <?php echo get_num_queries(); ?> queries em <?php timer_stop(1); ?> segundos.</p>
				</div>
			</div>
		</footer>

		<?php wp_footer(); ?>
	</body>
</html>
