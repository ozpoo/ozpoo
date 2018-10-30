<?php $count = 0; ?>
<?php if (have_posts()): ?>
<?php while (have_posts()) : the_post(); ?>

	<article class="news-archive-list" data-aos="fadeUp" data-aos-offset="0" data-aos-once="true" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
		<a href="<?php the_permalink(); ?>">
			<p><small><?php echo get_the_date("M Y"); ?></small></p>
			<h1>
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
			</h1>
		</a>
	</article>

<?php endwhile; ?>
<?php endif; ?>
