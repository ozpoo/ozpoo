<?php get_header(); ?>

	<main role="main">
		<section class="work-list">
			<?php get_template_part('loop-work'); ?>
			<?php get_template_part('pagination'); ?>
		</section>
	</main>

<?php get_footer(); ?>
