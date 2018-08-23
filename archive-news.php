<?php get_header(); ?>

	<main role="main">
		<section data-aos="fade-right" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="1200">
			<h1>News</h1>
		</section>
		<section data-aos="fade-right" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="1600">
			<h2>A selection of literature that has brought me joy and left an impacting influence on my world view.</h2>
		</section>
		<section class="list">
			<?php get_template_part('loop'); ?>
			<?php get_template_part('pagination'); ?>
		</section>
	</main>

<?php get_footer(); ?>
