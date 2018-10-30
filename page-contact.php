<?php get_header(); ?>
<?php
	if(is_ssl()) {
		$scheme = "https";
	} else {
		$scheme = "http";
	}
?>

		<main role="main">

			<section class="panel">

				<section class="flex back" data-aos="fade-right" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
					<?php $type = get_post_type_object(get_post_type( $post_id )); ?>
					<h1><a href="<?php echo get_site_url(null, '/', $scheme); ?>">&larr;</a></h1>
				</section>

				<section data-aos="fade-in" data-aos-offset="0" data-aos-once="true" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">

					<p>
						Contact
					</p>
					<p>
						Eric Andren<br>
						<a href="mailto:hello@ericandren.com">hello@ericandren.com</a>
					</p>
					<p>
						<a href="mailto:hello@ericandren.com">Instagram</a><br>
						<a href="mailto:hello@ericandren.com">Facebook</a><br>
						<a href="mailto:hello@ericandren.com">Twitter</a><br>
						<a href="mailto:hello@ericandren.com">Linkdin</a>
					</p>

				</section>

			</section>

		</main>

<?php get_footer(); ?>
