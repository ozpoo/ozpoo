<?php get_header(); ?>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<main role="main">
			<section data-aos="fade-right" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="1200">
				<h1>About ozpoø</h1>
			</section>
			<section data-aos="fade-right" data-aos-offset="0" data-aos-once="true" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="1600">
				<h2>As humans we are <span class="wordz">strong</span> &amp; the solutions we seek through the process of design should be too.</h2>
			</section>
			<div class="text-content" data-aos="fade-in" data-aos-offset="0" data-aos-once="true" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="2000">
				<?php the_content(); ?>
			</div>
		</main>
	<?php endwhile; endif; ?>
<?php get_footer(); ?>
