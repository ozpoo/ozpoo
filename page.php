<?php get_header(); ?>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<main role="main">
			<section>
				<h1><?php the_title(); ?></h1>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php the_content(); ?>
				</article>
			</section>
		</main>
	<?php endwhile; endif; ?>
<?php get_footer(); ?>
