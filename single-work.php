<?php get_header(); ?>
<?php
	if(is_ssl()) {
		$scheme = "https";
	} else {
		$scheme = "http";
	}
?>

	<main role="main">

		<?php while (have_posts()) : the_post(); ?>

			<div class="panel nobottom">
				<div class="flex back no-mobile-flex">
					<div>
						<?php $type = get_post_type_object(get_post_type($post_id)); ?>
						<h1 data-aos="fade-right" data-aos-once="true" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
							<a href="<?php echo get_site_url(null, '/', $scheme); ?>">&larr;</a>
						</h1>
					</div>
					<div data-aos="fade-in" data-aos-once="false" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
						<h1>
							<?php the_title(); ?>
						</h1>
					</div>
					<div class="excerpt" data-aos="fade-in" data-aos-once="false" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
						<h1>
							<?php the_excerpt(); ?>
						</h1>
						<p>
							<small class="setback">
							<?php
                $terms = get_the_terms(get_the_ID(), 'work_category');
                $numItems = count($terms);
                $i = 0;
                foreach ($terms as $term) {
                  if (++$i === $numItems) {
                      echo $term->name;
                  } else {
                      echo $term->name . ", ";
                  }
                }
              ?>
							</small>
						</p>
					</div>
				</div>
			</div>

			<div class="panel">
				<div class="content" data-aos="fade-in" data-aos-once="true" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
					<?php the_content(); ?>
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

				<!-- <div class="about-toggle">
					<div class="panel" data-aos="fade-right" data-aos-once="true" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
							<button>About &mdash; <?php the_title(); ?></button>
					</div>
					<div class="content">
						<?php echo get_field("about"); ?>
					</div>
				</div> -->

				<div class="pagination flex">
					<div>
						<h1 data-aos="fade-right" data-aos-once="true" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
							<a href="<?php echo get_site_url(null, '/', $scheme); ?>">&larr; Overview</a>
						</h1>
					</div>
					<div>
						<h1 data-aos="fade-left" data-aos-once="true" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
							<a href="<?php echo $nextPost; ?>">Next Project &rarr;</a>
						</h1>
					</div>
				</div>
			</div>

		<?php endwhile; ?>

	</main>

<?php get_footer(); ?>
