<?php get_header(); ?>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<main role="main">
			<h1>About</h1>
			<div class="content">
				<div class="text-intro">
					<h2>
						As humans we are <span class="wordz">strong</span> and so too should be our solutions through design.
					</h2>
				</div>
				<div class="text-content">
					<?php the_content(); ?>
				</div>
			</div>
		</main>
	<?php endwhile; endif; ?>
<?php get_footer(); ?>
