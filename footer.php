				<footer>
					<section class="links" data-aos="fade-in" data-aos-offset="80" data-aos-once="true" data-aos-easing="ease" data-aos-duration="1200">
						<ul class="tight-bottom">
							<li><a href="<?php echo site_url('/', 'http'); ?>">Profile</a></li>
						</ul>
						<ul class="tight-bottom tight-top">
							<li><a href="<?php echo site_url('/work/', 'http'); ?>">Work</a></li>
							<li>
								<ul>
									<?php
										$terms = get_terms([
									    'taxonomy' => "work_category",
									    'hide_empty' => true,
										]);
										foreach ($terms as $term) {
									?>
									<?php $url = "/work/category/" . $term->slug; ?>
										<li><a href="<?php echo site_url($url, 'http'); ?>"><?php echo $term->name; ?></a></li>
									<?php
										}
									?>
								</ul>
							</li>
							<li><a href="<?php echo site_url('/essay/', 'http'); ?>">Essays</a></li>
							<li><a href="<?php echo site_url('/research/', 'http'); ?>">Research</a></li>
							<li><a href="<?php echo site_url('/glossary/', 'http'); ?>">Glossary</a></li>
							<li><a href="<?php echo site_url('/student-work/', 'http'); ?>">Student Work</a></li>
							<li><a href="<?php echo site_url('/library/', 'http'); ?>">Library</a></li>
						</ul>
						<ul class="tight-top">
							<li><a href="<?php echo site_url('/privacy-policy/', 'http'); ?>">Privacy</a></li>
						</ul>
						<ul>
							<li><a href="mailto:hello@ozpoo.co">hello@ozpoo.co</a></li>
						</ul>
						<ul>
							<li><a href="https://www.facebook.com/ozpoo/" target="_blank">Facebook</a></li>
							<li><a href="https://twitter.com/ozpoo/" target="_blank">Twitter</a></li>
							<li><a href="https://www.instagram.com/ozpoo/" target="_blank">Instagram</a></li>
							<li><a href="https://www.linkedin.com/ozpoo/" target="_blank">LinkedIn</a></li>
						</ul>
					</section>
					<p>This site is protected by copyright. &copy;<?php the_date("Y"); ?> Eric 'Oz' Andren.</p>
				</footer>
			</div>
		</section>
		<?php wp_footer(); ?>
	</body>
</html>
