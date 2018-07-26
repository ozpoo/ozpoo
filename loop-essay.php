<?php if (have_posts()): ?>
<?php while (have_posts()) : the_post(); ?>

	<article class="post">
		<p>
			<strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong><br>
			<?php the_excerpt(); ?>
		</p>
	</article>

<?php endwhile; ?>
<?php endif; ?>
