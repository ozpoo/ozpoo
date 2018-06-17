<?php get_header(); ?>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<main role="main">
			<h1>
				Ten years of experience is coupled with a hungry digital drive.
			</h1>
			<?php the_content(); ?>
		</main>
	<?php endwhile; endif; ?>
<?php get_footer(); ?>
