<?php get_header(); ?>

		<main role="main">
			<section data-aos="fade-right" data-aos-offset="0" data-aos-once="true" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="1200">
				<h1>ozpoø</h1>
			</section>
			<section class="works">
				<?php
				$count = 0;
				$termCount = 0;
				$terms = get_terms([
			    'taxonomy' => 'work_category',
			    'hide_empty' => false,
				]);
				foreach($terms as $term) :
					$wp_query = new WP_Query();
					$args = array(
						'posts_per_page' => -1,
						'post_type' => 'work',
						'tax_query' => array(
							array(
								'taxonomy' => 'work_category',
								'field' => 'slug',
								'terms' => $term->name,
							)
						)
					);
					?>
					<section class="term" data-term="<?php echo $termCount++; ?>">
					<div class="title show">
						<?php $url = "/work/category/" . $term->slug; ?>
						<p><small><a href="<?php echo site_url($url, 'http'); ?>"><?php echo get_field("short_name", $term); ?></a></small></p>
					</div>
					<?php
					$wp_query->query($args);
					while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
					<article class="work" data-aos="fade-in" data-aos-offset="0" data-aos-once="true" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="<?php echo $count++ * 100; ?>">
					<!-- <article class="work" data-aos="fade-in" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="0"> -->
						<a href="<?php the_permalink(); ?>">
							<figure>
								<?php $thumb = get_post_thumbnail_id(); ?>
								<img
									alt=""
									src="<?php echo wp_get_attachment_image_src($thumb, 'w0l')[0]; ?>"
									sizes="auto"
									data-srcset="<?php echo wp_get_attachment_image_srcset($thumb, 'w01'); ?>"
									class="lazyload" />
							</figure>
						</a>
						<div class="description">
							<div class="left">
								<h5><?php the_title(); ?></h5>
							</div>
							<div class="right">
								<p class="category">
										<?php $term_list = wp_get_post_terms($post->ID, 'work_category', array("fields" => "all")); ?>
									<?php foreach ( $term_list as $term ): ?>
							    	<span><?php echo get_field("short_name", $term); ?></span>
									<?php endforeach; ?>
								</p>
							</div>
						</div>
					</article>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
					</section>
				<?php endforeach; ?>
			</section>
		</main>

<?php get_footer(); ?>
