<?php get_header(); ?>
<?php
	if(is_ssl()) {
		$scheme = "https";
	} else {
		$scheme = "http";
	}
?>

	<main role="main">

		<div class="panel back">
			<?php $type = get_post_type_object(get_post_type($post_id)); ?>
			<h1 data-aos="fade-right" data-aos-once="true" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
				<a href="<?php echo get_site_url(null, '/', $scheme); ?>">&larr;</a>
			</h1>
		</div>

		<section class="panel">
			<section class="news-archive">
				<?php get_template_part('loop-news'); ?>
				<?php get_template_part('pagination'); ?>
			</section>
		</section>

	</main>

<?php get_footer(); ?>
