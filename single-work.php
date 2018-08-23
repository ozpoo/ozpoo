<?php get_header(); ?>

	<main role="main">

		<section class="back">
			<?php $type = get_post_type_object(get_post_type( $post_id )); ?>
			<p><a href="<?php echo site_url('/' . $type->name . '/', 'http'); ?>">&larr; Back to <?php echo $type->labels->singular_name; ?></a></p>
		</section>

		<section class="container">
		<?php while (have_posts()) : the_post(); ?>
			<section data-aos="fade-right" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="1200">
				<h1><?php the_title(); ?></h1>
			</section>
			<section data-aos="fade-right" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="1600">
				<h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</h2>
			</section>
			<section class="flky">
				<section class="feature">
					<figure data-aos="fade-left" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="600">
						<?php $thumb = get_post_thumbnail_id(); ?>
						<img
							alt=""
							src="<?php echo wp_get_attachment_image_src($thumb, 'w01')[0]; ?>"
							sizes="auto"
							data-srcset="<?php echo wp_get_attachment_image_srcset($thumb, 'w03'); ?>"
							class="lazyload" />
					</figure>
				</section>
				<section class="feature">
					<figure data-aos="fade-left" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="800">
						<?php $thumb = get_post_thumbnail_id(); ?>
						<img
							alt=""
							src="<?php echo wp_get_attachment_image_src($thumb, 'w01')[0]; ?>"
							sizes="auto"
							data-srcset="<?php echo wp_get_attachment_image_srcset($thumb, 'w03'); ?>"
							class="lazyload" />
					</figure>
				</section>
				<section class="feature">
					<figure data-aos="fade-up" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="0">
						<?php $thumb = get_post_thumbnail_id(); ?>
						<img
							alt=""
							src="<?php echo wp_get_attachment_image_src($thumb, 'w01')[0]; ?>"
							sizes="auto"
							data-srcset="<?php echo wp_get_attachment_image_srcset($thumb, 'w03'); ?>"
							class="lazyload" />
					</figure>
				</section>
			</section>
			<section class="content">
				<?php the_content(); ?>
				<p><?php the_terms( $post->ID, 'work_category', '', ', ', ' ' ); ?></p>
			</section>
		<?php endwhile; ?>

		</section>

	</main>

<?php get_footer(); ?>
