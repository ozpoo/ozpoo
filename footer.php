				<nav class="menu-modal">
					<div class="close">
						<p><button class="menu-toggle">Close</button></p>
					</div>
					<section class="flex">
						<div class="column">
							<h4>Menu</h4>
							<ul class="links">
								<li><a href="<?php echo site_url('/', 'http'); ?>">Introduction</a></li>
							</ul>
							<ul class="links">
								<li><a href="<?php echo site_url('/work/', 'http'); ?>">Work</a></li>
								<li><a href="<?php echo site_url('/about/', 'http'); ?>">About ozpoø</a></li>
								<li><a href="<?php echo site_url('/news/', 'http'); ?>">News</a></li>
							</ul>
							<ul class="links">
								<li><a href="<?php echo site_url('/essay/', 'http'); ?>">Essays</a></li>
								<li><a href="<?php echo site_url('/360/', 'http'); ?>">360 Views</a></li>
								<li><a href="<?php echo site_url('/glossary/', 'http'); ?>">Glossary</a></li>
								<li><a href="<?php echo site_url('/library/', 'http'); ?>">Library</a></li>
								<li><a href="<?php echo site_url('/resources/', 'http'); ?>">Resources</a></li>
							</ul>
							<h4>Academia</h4>
							<ul class="links">
								<li><a href="<?php echo site_url('/research/', 'http'); ?>">Research</a></li>
								<li><a href="<?php echo site_url('/teaching-philosophy/', 'http'); ?>">Teaching Philosophy</a></li>
								<li><a href="<?php echo site_url('/design-philosophy/', 'http'); ?>">Design Philosophy</a></li>
								<li><a href="<?php echo site_url('/student-work/', 'http'); ?>">Student Work</a></li>
							</ul>
						</div>
						<div class="column">
							<h4>Work</h4>
							<ul class="links">
								<li><a href="<?php echo site_url('/work/', 'http'); ?>">All Work</a></li>
							</ul>
							<ul class="links">
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
							<h4>Contact</h4>
							<ul class="links">
								<li><a href="mailto:hello@ozpoo.co">hello@ozpoo.co</a></li>
							</ul>
							<ul class="links">
								<li><a href="https://www.facebook.com/ozpoo/" target="_blank">Facebook</a></li>
								<li><a href="https://twitter.com/ozpoo/" target="_blank">Twitter</a></li>
								<li><a href="https://www.instagram.com/ozpoo/" target="_blank">Instagram</a></li>
								<li><a href="https://www.linkedin.com/ozpoo/" target="_blank">LinkedIn</a></li>
							</ul>
						</div>
					</section>
				</nav>

				<footer>
					<section class="flex">
						<section class="column">
							<h4>Menu</h4>
							<ul class="links">
								<li><a href="<?php echo site_url('/', 'http'); ?>">Introduction</a></li>
							</ul>
							<ul class="links">
								<li><a href="<?php echo site_url('/work/', 'http'); ?>">Work</a></li>
								<li><a href="<?php echo site_url('/about/', 'http'); ?>">About ozpoø</a></li>
								<li><a href="<?php echo site_url('/news/', 'http'); ?>">News</a></li>
							</ul>
							<ul class="links">
								<li><a href="<?php echo site_url('/essay/', 'http'); ?>">Essays</a></li>
								<li><a href="<?php echo site_url('/360/', 'http'); ?>">360 Views</a></li>
								<li><a href="<?php echo site_url('/glossary/', 'http'); ?>">Glossary</a></li>
								<li><a href="<?php echo site_url('/library/', 'http'); ?>">Library</a></li>
								<li><a href="<?php echo site_url('/resources/', 'http'); ?>">Resources</a></li>
							</ul>
						</section>
						<section class="column">
							<h4>Academia</h4>
							<ul class="links">
								<li><a href="<?php echo site_url('/research/', 'http'); ?>">Research</a></li>
								<li><a href="<?php echo site_url('/teaching-philosophy/', 'http'); ?>">Teaching Philosophy</a></li>
								<li><a href="<?php echo site_url('/design-philosophy/', 'http'); ?>">Design Philosophy</a></li>
								<li><a href="<?php echo site_url('/student-work/', 'http'); ?>">Student Work</a></li>
							</ul>
						</section>
						<section class="column">
							<h4>Work</h4>
							<ul class="links">
								<li><a href="<?php echo site_url('/work/', 'http'); ?>">All Work</a></li>
							</ul>
							<ul class="links">
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
						</section>
						<section class="column">
							<h4>Contact</h4>
							<ul class="links">
								<li><a href="mailto:hello@ozpoo.co">hello@ozpoo.co</a></li>
							</ul>
							<ul class="links">
								<li><a href="https://www.facebook.com/ozpoo/" target="_blank">Facebook</a></li>
								<li><a href="https://twitter.com/ozpoo/" target="_blank">Twitter</a></li>
								<li><a href="https://www.instagram.com/ozpoo/" target="_blank">Instagram</a></li>
								<li><a href="https://www.linkedin.com/ozpoo/" target="_blank">LinkedIn</a></li>
							</ul>
						</section>
					</section>
					<section class="copy">
						<div class="column left">
							<p>This site is protected by copyright. &copy;<?php the_date("Y"); ?> Eric 'Oz' Andren.</p>
						</div>
						<div class="column right">
							<p><a href="<?php echo site_url('/privacy-policy/', 'http'); ?>">Privacy Policy</a></p>
						</div>
					</section>
				</footer>
			</div>
		</section>
		<?php wp_footer(); ?>
	</body>
</html>
