<?php get_header(); ?>

		<main role="main">
			<section class="slider">
				<section class="works flky">
					<?php
					$count = 0;
					$temp = $wp_query; $wp_query= null;
					$wp_query = new WP_Query(); $wp_query->query('posts_per_page=-1&post_type=work');
					while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
					<article class="work" data-aos="fade-left" data-aos-offset="100" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="<?php echo $count++ * 200; ?>">
						<button class="toggle">
							<figure>
								<?php $thumb = get_post_thumbnail_id(); ?>
								<img
									alt=""
									src="<?php echo wp_get_attachment_image_src($thumb, 'w01')[0]; ?>"
									sizes="auto"
									data-srcset="<?php echo wp_get_attachment_image_srcset($thumb, 'w08'); ?>"
									class="lazyload" />
							</figure>
						</button>
						<div class="description">
							<h5><?php the_title(); ?></h5>
							<p class="category">
									<?php $term_list = wp_get_post_terms($post->ID, 'work_category', array("fields" => "all")); ?>
								<?php foreach ( $term_list as $term ): ?>
						    	<span><?php echo $term->name; ?></span>
								<?php endforeach; ?>
							</p>
						</div>
					</article>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				</section>
			</section>
		</main>

<?php get_footer(); ?>
