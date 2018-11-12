<?php get_header(); ?>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<main role="main">

			<section class="page-content panel">

				<section class="flex back" data-aos="fade-right" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
					<?php $type = get_post_type_object(get_post_type( $post_id )); ?>
					<h1><a href="<?php echo site_url('/', 'http'); ?>">&larr;</a></h1>
				</section>

				<?php
					global $results;
			    echo $results;
				?>

			</section>

		</main>
	<?php endwhile; endif; ?>
<?php get_footer(); ?>
