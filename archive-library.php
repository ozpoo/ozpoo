<?php get_header(); ?>

	<main role="main">
		<section data-aos="fade-right" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="1200">
			<h1>Library</h1>
		</section>
		<section data-aos="fade-right" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="1600">
			<h2>A selection of literature I've enjoyed &amp; been influnced by.</h2>
		</section>
		<section class="list">
			<?php get_template_part('loop-library'); ?>
			<?php get_template_part('pagination'); ?>
		</section>
	</main>

<?php get_footer(); ?>
