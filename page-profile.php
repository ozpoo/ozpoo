<?php get_header(); ?>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<main role="main">
			<!-- <h2>About</h2> -->
			<div class="content">
				<div class="text-intro" data-aos="fade-right" data-aos-offset="0" data-aos-once="true" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="600">
					<h1>Humans are <span class="wordz">strong</span> <br>&amp; the solutions we seek through the process of design should be too.</h1>
				</div>
				<div class="text-content" data-aos="fade-in" data-aos-offset="0" data-aos-once="true" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="1200">
					<?php the_content(); ?>
				</div>
			</div>
		</main>
	<?php endwhile; endif; ?>
<?php get_footer(); ?>
