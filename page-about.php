<?php get_header(); ?>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<main role="main">
			<h1>
				As humans we are <span class="wordz">strong</span><br>and so too should be our solutions through design.
			</h1>
			<p>
				Together we can better explore ideas and construct realities that improve our wellbeing. This is why Stdio looks to project stakeholders as creative ambassadors that provide an invaluable source of inspiration and substance.
			</p>
			<!-- <?php the_content(); ?> -->
		</main>
	<?php endwhile; endif; ?>
<?php get_footer(); ?>
