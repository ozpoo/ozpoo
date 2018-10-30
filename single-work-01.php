<?php get_header(); ?>

	<main role="main">

		<?php while (have_posts()) : the_post(); ?>

			<div class="panel">
				<div class="flex back">
					<div>
						<?php $type = get_post_type_object(get_post_type($post_id)); ?>
						<h1 data-aos="fade-right" data-aos-once="true" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
							<a href="<?php echo site_url('/', 'http'); ?>">&larr;</a>
						</h1>
					</div>
					<div>
						<h1 data-aos="fade-in" data-aos-once="true" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
							<?php the_title(); ?>
							<!-- <span class="setback">
								<?php
                  $terms = get_the_terms(get_the_ID(), 'work_category');
                  $numItems = count($terms);
                  $i = 0;
                  foreach ($terms as $term) {
                    if (++$i === $numItems) {
                        echo $term->name;
                    } else {
                        echo $term->name . " & ";
                    }
                  }
                ?>
							</span> -->
						</h1>
					</div>
					<div>
						<h1 data-aos="fade-in" data-aos-once="false" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
							<?php the_excerpt(); ?>
						</h1>
					</div>
				</div>
			</div>

			<div class="panel nosides">
				<div class="flky">
					<?php
					if( have_rows('gallery') ):
			    while ( have_rows('gallery') ) : the_row();
					?>
					<div class="feature">
						<figure data-aos="fade-in" data-aos-once="true" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
							<?php $thumb = get_sub_field('image'); ?>
							<img
								alt=""
								src="<?php echo wp_get_attachment_image_src($thumb, 'w01')[0]; ?>"
								sizes="auto"
								data-srcset="<?php echo wp_get_attachment_image_srcset($thumb, 'w03'); ?>"
								class="lazyload" />
							<?php $embed = get_sub_field('embed'); ?>
							<?php if( $embed ): ?>
							<?php echo $embed; ?>
							<?php endif; ?>
						</figure>
					</div>
					<?php
			    endwhile;
					endif;
					?>
				</div>
			</div>

			<div class="panel">
				<div class="flex">
					<div data-aos="fade-in" data-aos-once="true" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
						<p>
							About
						</p>
					</div>
					<div data-aos="fade-in" data-aos-once="true" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
						<?php the_content(); ?>
					</div>
				</div>
				<?php
          if (get_adjacent_post(false, '', true)) {
              $nextPost = get_adjacent_post(false, '', true);
              $nextPost = get_the_permalink($nextPost->ID);
          } else {
              $nextPost = new WP_Query('posts_per_page=1&order=ASC&post_type=work&orderby=menu_order');
              $nextPost->the_post();
              $nextPost = get_the_permalink($nextPost->ID);
              wp_reset_query();
          }
          if (get_adjacent_post(false, '', false)) {
              $prevPost = get_adjacent_post(false, '', false);
              $prevPost = get_the_permalink($prevPost->ID);
          } else {
              $prevPost = new WP_Query('posts_per_page=1&order=DESC&post_type=work&orderby=menu_order');
              $prevPost->the_post();
              $prevPost = get_the_permalink($prevPost->ID);
              wp_reset_query();
          }
        ?>
				<div class="pagination flex">
					<div>
						<h1 data-aos="fade-right" data-aos-once="true" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200"><a href="<?php echo site_url('/', 'http'); ?>">
							<a href="<?php echo site_url('/', 'http'); ?>">&larr; Overview</a>
						</h1>
					</div>
					<div>
						<h1 data-aos="fade-left" data-aos-once="true" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200"><a href="<?php echo site_url('/', 'http'); ?>">
							<a href="<?php echo $nextPost; ?>">Next Project &rarr;</a>
						</h1>
					</div>
				</div>
			</div>

		<?php endwhile; ?>

	</main>

<?php get_footer(); ?>
