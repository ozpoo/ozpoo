<?php $count = 0; ?>
<?php if (have_posts()): ?>
<?php while (have_posts()) : the_post(); ?>

	<article class="list-post" data-aos="fade-in" data-aos-offset="0" data-aos-once="true" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="0">
		<a href="<?php the_permalink(); ?>">
			<!-- <p><strong><?php the_title(); ?></strong></p> -->
			<figure>
				<!-- <span class="category">
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
					<?php the_title(); ?>
				</span> -->
				<?php if ( has_post_thumbnail()) : ?>
					<?php $thumb = get_post_thumbnail_id(); ?>
					<img
						alt="<?php the_title(); ?>"
						src="<?php echo wp_get_attachment_image_src($thumb, 'w0l')[0]; ?>"
						sizes="auto"
						data-srcset="<?php echo wp_get_attachment_image_srcset($thumb, 'w01'); ?>"
						class="lazyload" />
				<?php else: ?>
					<?php $thumb = "1593"; ?>
					<img
						alt="placeholder"
						src="<?php echo wp_get_attachment_image_src($thumb, 'full')[0]; ?>"
						class="placeholder" />
				<?php endif; ?>
			</figure>
			<p>
				<small>
					<?php the_excerpt(); ?>
				</small>
			</p>
		</a>
	</article>

<?php endwhile; ?>
<?php endif; ?>
