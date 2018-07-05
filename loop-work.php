<?php if (have_posts()): ?>
<?php while (have_posts()) : the_post(); ?>

	<article class="work-list-post">
		<?php if ( has_post_thumbnail()) : ?>
			<?php $thumb = get_post_thumbnail_id(); ?>
			<figure data-aos="fade-up" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="0">
				<p>
					<?php $thumb = get_post_thumbnail_id(); ?>
					<img
						alt=""
						src="<?php echo wp_get_attachment_image_src($thumb, 'w01')[0]; ?>"
						sizes="auto"
						data-srcset="<?php echo wp_get_attachment_image_srcset($thumb, 'w03'); ?>"
						class="lazyload" />
				</p>
			</figure>
		<?php endif; ?>
		<p>
			<strong><?php the_title(); ?></strong><br>
			<?php the_excerpt(); ?>
		</p>
	</article>

<?php endwhile; ?>
<?php endif; ?>
