<?php $count = 0; ?>
<?php if (have_posts()): ?>
<?php while (have_posts()) : the_post(); ?>

	<article class="list-post">
		<a href="<?php the_permalink(); ?>">
			<?php if ( has_post_thumbnail()) : ?>
				<?php $thumb = get_post_thumbnail_id(); ?>
				<figure data-aos="fade-up" data-aos-offset="0" data-aos-once="true" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="<?php if ($count < 6) { echo $count++ * 100; } ?>">
					<span class="category">
						<?php
							$terms = get_the_terms(get_the_ID(), 'work_category');
							$numItems = count($terms);
							$i = 0;
							foreach($terms as $term){
								if(++$i === $numItems) {
									echo get_field("short_name", $term);
								} else {
									echo get_field("short_name", $term) . " & ";
								}
							}
						?>
					</span>
					<?php $thumb = get_post_thumbnail_id(); ?>
					<img
						alt="<?php the_title(); ?>"
						src="<?php echo wp_get_attachment_image_src($thumb, 'w01')[0]; ?>"
						sizes="auto"
						data-srcset="<?php echo wp_get_attachment_image_srcset($thumb, 'w02'); ?>"
						class="lazyload" />
				</figure>
			<?php endif; ?>
			<small data-aos="fade-in" data-aos-offset="0" data-aos-once="true" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="1200">
				<span class="set-back"><span class="title"><?php the_title(); ?></span> &mdash; Contrary to popular belief, Lorem Ipsum is not simply random text.</span>
			</small>
		</a>
	</article>

<?php endwhile; ?>
<?php endif; ?>
