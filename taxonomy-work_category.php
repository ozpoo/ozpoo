<?php get_header(); ?>

	<main role="main">
		<section data-aos="fade-right" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="1200">
			<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>
			<h1>Works &mdash; <?php echo $term->name; ?></h1>
			<h2><?php echo $term->description; ?></h2>
		</section>
		<section class="work-list">
			<?php get_template_part('loop-work'); ?>
			<?php get_template_part('pagination'); ?>
		</section>
	</main>

<?php get_footer(); ?>
