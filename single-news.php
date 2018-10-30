<?php get_header(); ?>

	<main role="main">

		<section class="panel page-content">

			<section class="back" data-aos="fade-right" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
				<?php $type = get_post_type_object(get_post_type( $post_id )); ?>
				<h1><a href="<?php echo site_url('/' . $type->name . '/', 'http'); ?>">&larr;</a></h1>
			</section>

			<?php while (have_posts()) : the_post(); ?>

				<section data-aos="fade-in" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
					<div>
						<p>
							<span class="setback">
							<?php
								$terms = get_the_terms(get_the_ID(), 'news_category');
								$numItems = count($terms);
								$i = 0;
								foreach($terms as $term){
									if(++$i === $numItems) {
										echo $term->name;
									} else {
										echo $term->name . " & ";
									}
								}
							?>
						</span><br>
							<?php the_title(); ?>
						</p>
					</div>
					<div>
						<?php the_content(); ?>
					</div>
				</section>

			<?php endwhile; ?>

		</section>

	</main>

<?php get_footer(); ?>
