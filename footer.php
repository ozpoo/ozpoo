<?php
	if(is_ssl()) {
		$scheme = "https";
	} else {
		$scheme = "http";
	}
?>
				<footer>
					<div class="panel">
						<div class="flex">
							<div data-aos="fade-in" data-aos-once="true" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
								<p>
									<small>
										Project inquiries<br>
										<a href="mailto:hello@ericandren.com">hello@ericandren.com</a>
									</small>
								</p>
							</div>
							<div data-aos="fade-in" data-aos-once="true" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
								<p>
									<small>
										Follow on <a href="https://www.instagram.com/ozpoo/" target="_blank">Instagram</a>
									</small>
									<small>
										Connect on <a href="https://www.linkedin.com/in/ozpoo/" target="_blank">LinkedIn</a>
									</small>
								</p>
							</div>
							<!-- <div data-aos="fade-in" data-aos-once="true" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
								<p>
									<small>
										<a href="<?php echo get_site_url(null, '/', $scheme); ?>">Back to top</a>
									</small>
								</p>
							</div> -->
							<div data-aos="fade-in" data-aos-once="true" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
								<p>
									<small>
										<a href="<?php echo get_site_url(null, '/work/', $scheme); ?>">Work</a><br>
										<a href="<?php echo get_site_url(null, '/news/', $scheme); ?>">News</a><br>
										<a href="<?php echo get_site_url(null, '/privacy/', $scheme); ?>">Privacy</a>
									</small>
								</p>
							</div>
						</div>
					</div>
				</footer>
			</div>
		</section>
		<?php wp_footer(); ?>
	</body>
</html>
