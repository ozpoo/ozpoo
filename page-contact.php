<?php get_header(); ?>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<main role="main">
			<!-- <h1>Contact</h1> -->
			<div class="content">
				<div class="text-intro">
					<h1>
						Ten years of experience is coupled with a hungry digital drive.
					</h1>
				</div>
				<div class="text-content">
					<?php the_content(); ?>
				</div>
			</div>
		</main>
	<?php endwhile; endif; ?>
<?php get_footer(); ?>
