<?php get_header(); ?>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<main role="main">

			<section class="panel">

				<!-- <section class="flex back" data-aos="fade-right" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
					<?php $type = get_post_type_object(get_post_type( $post_id )); ?>
					<h1><a href="<?php echo site_url('/', 'http'); ?>">&larr;</a></h1>
				</section> -->

				<section class="flex" data-aos="fade-in" data-aos-offset="0" data-aos-once="true" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
					<p>About</p>
				</section>

				<section class="flex" data-aos="fade-in" data-aos-offset="0" data-aos-once="true" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
					<div>
						<p>
							<span class="setback">Graphic Designer, Web Developer, & Creative Technologist</span>
						</p>
					</div>
					<div>
						<p>Mildred &amp; Duck is a Melbourne-based graphic design and communication studio established by Sigiriya Brown and Daniel Smith. We design for print, digital and environmental media, creating solutions that communicate and connect with people.</p>
						<p>We work across a variety of sectors with a range of clients, from startups to established organisations, continually delivering thoughtfully crafted outcomes regardless of scope or budget. The small size of our team allows us to be flexible and take care of every single detail during the design process, ensuring a high level of execution no matter the scale of the project.</p>
					</div>
				</section>

				<section class="flex" data-aos="fade-in" data-aos-offset="0" data-aos-once="true" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
					<p>Services</p>
				</section>

				<section class="flex" data-aos="fade-in" data-aos-offset="0" data-aos-once="true" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
					<div>
						<p>
							<span class="setback">Always excited to tackle new problems</span>
						</p>
					</div>
					<div>
						<p>We apply design thinking to every situation and always welcome new challenges. Some of the services we perform most often include:</p>
						<p>
							– Logo design<br>
							– Brand development<br>
							– Naming strategies<br>
							– Books and publications<br>
							– Annual reports<br>
							– Stationery and other collateral<br>
							– Web and digital design<br>
							– Environmental design
						</p>
					</div>
				</section>

			</section>

		</main>
	<?php endwhile; endif; ?>
<?php get_footer(); ?>
