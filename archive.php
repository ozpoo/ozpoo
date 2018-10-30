<?php get_header(); ?>
<?php
	if(is_ssl()) {
		$scheme = "https";
	} else {
		$scheme = "http";
	}
?>

	<main role="main">
		<section class="list">
			<?php get_template_part('loop'); ?>
			<?php get_template_part('pagination'); ?>
		</section>
	</main>

<?php get_footer(); ?>
