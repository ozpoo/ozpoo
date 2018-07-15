<?php get_header(); ?>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<main role="main">
			<!-- <h2>About</h2> -->
			<div class="content">
				<div class="text-intro">
					<h1>
						As humans we are <span class="wordz">strong</span> <br>and so too should be our solutions through design.
					</h1>
				</div>
				<div class="text-content">
					<?php the_content(); ?>
				</div>
			</div>
		</main>
	<?php endwhile; endif; ?>
<?php get_footer(); ?>
