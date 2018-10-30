<?php get_header(); ?>

		<main role="main">

			<video
				id="video"
				title="Eric Andren"
				webkit-playsinline="true"
				playsinline="true"
				muted="true"
				style="visibility:hidden; position: absolute; top: 0; pointer-events: none;"
				autoplay="true"
				loop="true">
				<source src="<?php echo get_template_directory_uri(); ?>/assets/video/me.webm" type="video/webm">
				<source src="<?php echo get_template_directory_uri(); ?>/assets/video/me.mp4" type="video/mp4">
			</video>

			<div class="threewrap" data-aos="fade-in" data-aos-once="true" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="0">

				<div class="background">
					<div class="panel text">
						<p data-aos="fadeUp" data-aos-once="true" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="600">
							<!-- Generator: Adobe Illustrator 23.0.0, SVG Export Plug-In  -->
							<svg version="1.0" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="53px"
								 height="53px" viewBox="0 0 53 53" style="enable-background:new 0 0 53 53;" xml:space="preserve">
							<style type="text/css">
								.st0{fill:none;stroke:#F9F5EC;stroke-width:3;stroke-miterlimit:10;}
							</style>
							<defs>
							</defs>
							<circle class="st0" cx="26.5" cy="26.5" r="25"/>
							<line class="st0" x1="51.5" y1="51.5" x2="1.5" y2="1.5"/>
							</svg>
						</p>
						<h1 data-aos="fadeUp" data-aos-once="true" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="600">Eric 'Oz' Andren is a Seattle based interaction designer with a focus on creating unique and engaging solutions.</h1>
					</div>
					<div class="threeframe" data-aos="fade-in" data-aos-offset="0" data-aos-once="true" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="1200">
						<figure class="threejs"></figure>
					</div>
				</div>

				<div class="navigation panel">
					<nav>
						<div class="flex" data-aos="fadeUp" data-aos-once="true" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="1800">
							<div>
								<small>
									<span class="setback">Project inquiries</span><br>
									<a href="mailto:hello@ericandren.com">hello@ericandren.com</a>
								</small>
							</div>
						</div>
					</nav>
				</div>
			</div>

		</main>

<?php get_footer(); ?>
