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
							<div><a class="workScroll wp-link" href="<?php echo site_url('/work/', 'http'); ?>">Work</a></div>
							<div><a href="<?php echo site_url('/news/', 'http'); ?>">News</a></div>
						</div>
					</nav>
				</div>
			</div>

			<div class="panel intro">
				<div>
					<h1 data-aos="fadeUp" data-aos-once="true" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">His work often explores the realms of brand identity, web, creative technology and social psychology.</h1>
				</div>
				<div class="flex">
					<div data-aos="fadeUp" data-aos-once="true" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
						<p>
							<small>
								Follow on <a href="https://www.instagram.com/ozpoo/" target="_blank">Instagram</a>
							</small>
						</p>
					</div>
					<div data-aos="fadeUp" data-aos-once="true" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
						<p>
							<small>
								Connect on <a href="https://www.linkedin.com/in/ozpoo/" target="_blank">LinkedIn</a>
							</small>
						</p>
					</div>
				</div>
			</div>

			<div class="panel">
				<div class="work-archive">
					<?php
						$count = 1;
						$temp = $wp_query; $wp_query= null;
						$wp_query = new WP_Query(); $wp_query->query( array( 'post_type' => 'work', 'posts_per_page' => -1 ) );
						while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
						<article class="work-archive-grid" data-aos="fadeUp" data-aos-offset="0" data-aos-once="true" data-aos-easing="ease" data-aos-duration="1200" data-aos-delay="200">
							<a href="<?php the_permalink(); ?>">
								<h1><?php echo str_pad($count++, 2, '0', STR_PAD_LEFT); ?></h1>
								<div class="flex">
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
										<figure class="main">
											<?php if ( has_post_thumbnail()) : ?>
												<?php $thumb = get_post_thumbnail_id(); ?>
												<img
													alt="<?php the_title(); ?>"
													src="<?php echo wp_get_attachment_image_src($thumb, 'w0l')[0]; ?>"
													sizes="auto"
													data-srcset="<?php echo wp_get_attachment_image_srcset($thumb, 'w01'); ?>"
													class="lazyload main-img" />
											<?php endif; ?>
											<figure class="hover">
												<?php $thumb = get_field("hover_image"); ?>
												<img
													alt="<?php the_title(); ?>"
													src="<?php echo wp_get_attachment_image_src($thumb, 'w0l')[0]; ?>"
													sizes="auto"
													data-srcset="<?php echo wp_get_attachment_image_srcset($thumb, 'w01'); ?>"
													class="lazyload hover-img" />
											</figure>
										</figure>
									</div>
								</div>
							</a>
						</article>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				</div>
			</div>

		</main>

		<!-- <script>

			(function ($, root, undefined) {

				$(function () {

					var camera, scene, renderer, plane;
					var video, videoTexture,videoMaterial;
					var composer;
					var shaderTime = 0;
					var badTVParams, badTVPass;
					var staticParams, staticPass;
					var rgbParams, rgbPass;
					var filmParams, filmPass;
					var renderPass, copyPass;
					var pnoise, globalParams;

					$(document).ready(function() {
						setTimeout(function(){
							init();
							animate();
						}, 400);
					});

					$(window).load(function() {

					});

					function init() {

						camera = new THREE.PerspectiveCamera(55, 1080/ 720, 20, 3000);
						camera.position.z = 1000;
						scene = new THREE.Scene();

						video = document.getElementById("video");

						videoTexture = new THREE.Texture( video );
						videoTexture.minFilter = THREE.LinearFilter;
						videoTexture.magFilter = THREE.LinearFilter;
						videoMaterial = new THREE.MeshBasicMaterial( {
							map: videoTexture
						} );

						var planeGeometry = new THREE.PlaneGeometry( 1080, 720,1,1 );
						plane = new THREE.Mesh( planeGeometry, videoMaterial );
						scene.add( plane );
						plane.z = 0;

						setScale();

						renderer = new THREE.WebGLRenderer();
						renderer.setSize( 800, 600 );

						$(".threejs").append( renderer.domElement );

						renderPass = new THREE.RenderPass( scene, camera );
						badTVPass = new THREE.ShaderPass( THREE.BadTVShader );
						rgbPass = new THREE.ShaderPass( THREE.RGBShiftShader );
						filmPass = new THREE.ShaderPass( THREE.FilmShader );
						staticPass = new THREE.ShaderPass( THREE.StaticShader );
						copyPass = new THREE.ShaderPass( THREE.CopyShader );

						filmPass.uniforms.grayscale.value = 0;

						badTVParams = {
							mute:true,
							show: true,
							distortion: 3.0,
							distortion2: 1.0,
							speed: 0.3,
							rollSpeed: 0.1
						};

						staticParams = {
							show: true,
							amount:0.5,
							size:4.0
						};

						rgbParams = {
							show: true,
							amount: 0.005,
							angle: 0.0,
						};

						filmParams = {
							show: true,
							count: 800,
							sIntensity: 0.9,
							nIntensity: 0.4
						};

						onToggleShaders();
						onToggleMute();
						onParamsChange();

						window.addEventListener('resize', onResize, false);
						renderer.domElement.addEventListener('click', randomizeParams, false);
						setInterval(function(){
							randomizeParams();
							// console.log('rando');
						}, 2400);

						onResize();
						randomizeParams();

					}

					function onParamsChange() {

						badTVPass.uniforms[ 'distortion' ].value = badTVParams.distortion;
						badTVPass.uniforms[ 'distortion2' ].value = badTVParams.distortion2;
						badTVPass.uniforms[ 'speed' ].value = badTVParams.speed;
						badTVPass.uniforms[ 'rollSpeed' ].value = badTVParams.rollSpeed;
						staticPass.uniforms[ 'amount' ].value = staticParams.amount;
						staticPass.uniforms[ 'size' ].value = staticParams.size;
						rgbPass.uniforms[ 'angle' ].value = rgbParams.angle*Math.PI;
						rgbPass.uniforms[ 'amount' ].value = rgbParams.amount;
						filmPass.uniforms[ 'sCount' ].value = filmParams.count;
						filmPass.uniforms[ 'sIntensity' ].value = filmParams.sIntensity;
						filmPass.uniforms[ 'nIntensity' ].value = filmParams.nIntensity;

					}

					function randomizeParams() {

						if (Math.random() <0.2) {

							badTVParams.distortion = 0.1;
							badTVParams.distortion2 =0.1;
							badTVParams.speed =0;
							badTVParams.rollSpeed =0;
							rgbParams.angle = 0;
							rgbParams.amount = 0;
							staticParams.amount = 0;

						} else {

							badTVParams.distortion = Math.random()*10+0.1;
							badTVParams.distortion2 =Math.random()*10+0.1;
							badTVParams.speed =Math.random()*0.4;
							badTVParams.rollSpeed =Math.random()*0.2;
							rgbParams.angle = Math.random()*2;
							rgbParams.amount = Math.random()*0.03;
							staticParams.amount = Math.random()*0.2;

						}

						onParamsChange();

					}

					function onToggleMute() {
						video.volume  = badTVParams.mute ? 0 : 1;
					}

					function onToggleShaders() {

						composer = new THREE.EffectComposer( renderer);
						composer.addPass( renderPass );

						if (filmParams.show) {
							composer.addPass( filmPass );
						}

						if (badTVParams.show) {
							composer.addPass( badTVPass );
						}

						if (rgbParams.show) {
							composer.addPass( rgbPass );
						}

						if (staticParams.show) {
							composer.addPass( staticPass );
						}

						composer.addPass( copyPass );
						copyPass.renderToScreen = true;

					}

					function animate() {

						shaderTime += 0.1;
						badTVPass.uniforms[ 'time' ].value =  shaderTime;
						filmPass.uniforms[ 'time' ].value =  shaderTime;
						staticPass.uniforms[ 'time' ].value =  shaderTime;

						if ( video.readyState === video.HAVE_ENOUGH_DATA ) {
							if ( videoTexture ) videoTexture.needsUpdate = true;
						}

						requestAnimationFrame( animate );
						composer.render( 0.1 );
					}

					function onResize() {
						setScale();
						renderer.setSize($(".threejs").width(), $(".threejs").height());
						camera.aspect = $(".threejs").width() / $(".threejs").height();
						camera.updateProjectionMatrix();
					}

					function setScale() {
						var scale = $(".threejs").width()/$(".threejs").height();
						if(scale < 1.45) {
							scale = 1.45;
						}
						plane.scale.x = plane.scale.y = scale;
					}

					function supportsVideoType(type) {
					  let video;

					  let formats = {
					    ogg: 'video/ogg; codecs="theora"',
					    h264: 'video/mp4; codecs="avc1.42E01E"',
					    webm: 'video/webm; codecs="vp8, vorbis"',
					    vp9: 'video/webm; codecs="vp9"',
					    hls: 'application/x-mpegURL; codecs="avc1.42E01E"'
					  };

					  if(!video) {
					    video = document.createElement('video')
					  }

					  return video.canPlayType(formats[type] || type);
					}

				});

			})(jQuery, this);

		</script> -->

<?php get_footer(); ?>
