<?php if (have_posts()): ?>
<?php while (have_posts()) : the_post(); ?>

	<article class="work-list-post">
		<?php if ( has_post_thumbnail()) : ?>
			<?php $thumb = get_post_thumbnail_id(); ?>
			<a href="<?php the_permalink(); ?>">
				<figure data-aos="fade-up" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="0">
					<?php $thumb = get_post_thumbnail_id(); ?>
					<img
						alt=""
						src="<?php echo wp_get_attachment_image_src($thumb, 'w01')[0]; ?>"
						sizes="auto"
						data-srcset="<?php echo wp_get_attachment_image_srcset($thumb, 'w03'); ?>"
						class="lazyload" />
				</figure>
			<?php endif; ?>
			<small class="title" data-aos="fade-in" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="0">
				<?php the_title(); ?><span class="set-back"> &mdash; Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</span>
				<!-- <?php the_excerpt(); ?> -->
			</small>
		</a>
	</article>

<?php endwhile; ?>
<?php endif; ?>
