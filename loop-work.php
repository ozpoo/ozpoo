<?php $count = 1; ?>
<?php if (have_posts()): ?>
<?php while (have_posts()) : the_post(); ?>

	<article class="work-archive-grid" data-aos="fadeUp" data-aos-offset="0" data-aos-once="true" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
		<a href="<?php the_permalink(); ?>">
			<h1><?php echo str_pad($count++, 2, '0', STR_PAD_LEFT); ?></h1>
			<section class="pad flex">
				<div>
					<p>
						<?php the_title(); ?><br>
							<span class="setback">
							<?php
								$terms = get_the_terms(get_the_ID(), 'work_category');
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
						</span>
					</p>
				</div>
				<div>
					<figure>
						<?php if ( has_post_thumbnail()) : ?>
							<?php $thumb = get_post_thumbnail_id(); ?>
							<img
								alt="<?php the_title(); ?>"
								src="<?php echo wp_get_attachment_image_src($thumb, 'w0l')[0]; ?>"
								sizes="auto"
								data-srcset="<?php echo wp_get_attachment_image_srcset($thumb, 'w01'); ?>"
								class="lazyload" />
						<?php endif; ?>
					</figure>
				</div>
			</section>
		</a>
	</article>

<?php endwhile; ?>
<?php endif; ?>
