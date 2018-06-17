<?php get_header(); ?>

	<main role="main">

		<section class="container">

		<?php while (have_posts()) : the_post(); ?>
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php the_content(); ?>
		<?php endwhile; ?>

		</section>

		<script>

			(function ($, root, undefined) {
				$(function () {

					var loaded, flky, scrollTop, delta;

					$(document).ready(function() {
						init();
					});

					$(window).load(function() {
						reveal();
						animate();
					});

					function init() {

					}

					function reveal() {

					}

					function animate() {
						requestAnimationFrame( animate );

					}

					(function() {
						var lastTime = 0;
						var vendors = ['ms', 'moz', 'webkit', 'o'];
						for(var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
							window.requestAnimationFrame = window[vendors[x]+'RequestAnimationFrame'];
							window.cancelAnimationFrame = window[vendors[x]+'CancelAnimationFrame'] || window[vendors[x]+'CancelRequestAnimationFrame'];
						}

						if (!window.requestAnimationFrame) {
							window.requestAnimationFrame = function(callback, element) {
								var currTime = new Date().getTime();
								var timeToCall = Math.max(0, 16 - (currTime - lastTime));
								var id = window.setTimeout(function() { callback(currTime + timeToCall); },
								timeToCall);
								lastTime = currTime + timeToCall;
								return id;
							}
						}

						if (!window.cancelAnimationFrame) {
							window.cancelAnimationFrame = function(id) {
								clearTimeout(id);
							}
						}
					}());

				});
			})(jQuery, this);

		</script>

	</main>

<?php get_footer(); ?>
