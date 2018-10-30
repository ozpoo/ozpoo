(function ($, root, undefined) {

	$(function () {

		var $lastScrollTop, $scrollTop, $current, $flky, $options, $humans;
		var camera, scene, renderer, plane;
		var video, videoTexture, videoMaterial;
		var composer;
		var shaderTime = 0;
		var badTVParams, badTVPass;
		var staticParams, staticPass;
		var rgbParams, rgbPass;
		var filmParams, filmPass;
		var renderPass, copyPass, interval;
		var pnoise, globalParams, threeFrame, webFrame;

		$(window).load(function() {
			init();
			animate();
		});

		var init = function() {
			document.addEventListener("touchstart", function() {}, true);
			$lastScrollTop = $scrollTop = $(document).scrollTop();
			$current = "show";
			var elements = $('.sticky');
			Stickyfill.add(elements);
			setScroll();
			addBlacklist();
			setSmoothState();
			setBackground($("#site-content-wrap"));
			setFlky();
			setListeners();
			setVideos();
			resize();
			if($("#site-content-wrap").hasClass("home")) {
				setTimeout(function() {
					initThree();
					animateThree();
				}, 400);
			}
			aos();
		};

		var setSmoothState = function() {
			$options = {
				prefetch: true,
				scroll: false,
				cacheLength: 0,
				repeatDelay: 600,
				loadingClass: 'is-loading',
        anchors: 'a',
				blacklist: '.wp-link',
				onBefore: function($currentTarget, $container) { },
				onStart: {
					duration: 600,
          render: function ( $container ) {
						$container.addClass('is-exiting');
		        $smoothState.restartCSSAnimations();
						killThree();
						hide();
          }
        },
				onProgress: {
			    duration: 0,
			    render: function ($container) {
						$(".loader").addClass("show");
					}
			  },
				onReady: {
			    duration: 0,
			    render: function($container, $newContent) {
						$container.html("");
						$(".loader").removeClass("show");
						$container.removeClass('is-exiting');
						doScroll();
						setBackground($newContent);
					}
				},
        onAfter: function( $container, $newContent ) {
					$container.html($newContent);
					setFlky();
					setListeners();
					setVideos();
					resize();
					if($("#site-content-wrap").hasClass("home")) {
						setTimeout(function() {
							initThree();
							animateThree();
						}, 400);
					}
					aos();
				}
      };
			$smoothState = $('#page').smoothState($options).data('smoothState');
		};

		var setBackground = function($newContent) {
			if($newContent.hasClass("single")) {
				$("body").attr("data-background", "single");
			} else if($newContent.hasClass("home")) {
				$("body").attr("data-background", "home");
			} else {
				$("body").attr("data-background", "none");
			}
		};

		var setVideos = function() {
			$('.lazy-video').each(function(){
				// if(!mobileCheck()) {
					addSourceToVideo($(this));
				// }
			});
		};

		var aos = function() {
			AOS.init();
		};

		var addBlacklist = function() {
			$('a').each( function() {
				if ( this.href.indexOf('/wp-admin/') !== -1 ||
					 this.href.indexOf('/wp-login.php') !== -1 ) {
					$( this ).addClass( 'wp-link' );
				}
			});
		};

		var setScroll = function(direction) {
		  if ('scrollRestoration' in history) {
		    history.scrollRestoration = 'manual';
		  }
		  $scrollTo = 0;
		};

		var resize = function() {
			$(".loader").height($(window).height());
		};

		var doScroll = function(direction) {
		  $("html, body").animate({
		    scrollTop: $scrollTo + "px"
		  }, 10);
		  $scrollTo = history.state.scrollTop;
		};

		var hide = function() {
			TweenLite.to($("#site-content-wrap"), .4, {autoAlpha:0, delay:0});
		};

		var killThree = function() {
			$(".workScroll, .background").off('click');
			clearInterval(interval);
			cancelAnimationFrame(threeFrame);
			cancelAnimationFrame(webFrame);
			empty($(".threejs"));
			if($flky) {
				$flky.destroy();
			}
			$lastScrollTop = $scrollTop = $current = $flky = $options = $humans = null;
			camera = scene = renderer = plane = null;
			video = videoTexture = videoMaterial = null;
			composer = shaderTime = badTVParams = badTVPass = null;
			staticParams = staticPass = rgbParams = rgbPass = null;
			filmParams = filmPass = null;
			renderPass = copyPass = pnoise = globalParams = threeFrame = webFrame = null;
		};

		var empty = function(elem) {
	    while (elem.lastChild) elem.removeChild(elem.lastChild);
		};

		var animate = function() {
			webFrame = requestAnimationFrame( animate );
			$scrollTop = $(document).scrollTop();
			switch (getDirection()) {
				case "up":
					setMenuTransform("show");
					break;
				case "down":
					setMenuTransform("hide");
					break;
				default:
					break;
			}
			$lastScrollTop = $scrollTop;
		};

		var getDirection = function() {
			var direction;
			if($lastScrollTop < $scrollTop && $scrollTop > 0) {
				direction = "down";
			} else if($lastScrollTop > $scrollTop && $scrollTop > 0) {
				direction = "up";
			} else {
				direction = null;
			}
			return direction;
		};

		var setListeners = function() {
			$(".workScroll, .background").on('click', function (e){
				e.preventDefault();
				$('html, body').animate({
					scrollTop: $(".intro").offset().top
				}, 800);
			});
		};

		var setFlky = function() {
			if($(".flky").length) {
				$flky = new Flickity('.flky', {
					fullscreen: false,
					accessibility: true,
					adaptiveHeight: false,
					autoPlay: false,
					cellAlign: 'left',
					cellSelector: undefined,
					contain: true,
					draggable: true,
					dragThreshold: 3,
					freeScroll: false,
					selectedAttraction: 0.1,
					friction: 1,
					groupCells: false,
					initialIndex: 0,
					lazyLoad: false,
					percentPosition: false,
					prevNextButtons: false,
					pageDots: true,
					resize: true,
					rightToLeft: false,
					setGallerySize: true,
					watchCSS: false,
					wrapAround: false,
				});
			}
		};

		var setMenuTransform = function(state) {
			if(state == "show" && $current != "show") {
				$current = "show";
			} else if(state == "hide" && $current != "hide") {
				$current = "hide";
			} else if(state == "top" && $current != "hide") {
				$current = "show";
			}
		};

		var requestAnimationFrame = function() {
	    return (
        window.requestAnimationFrame       ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame    ||
        window.oRequestAnimationFrame      ||
        window.msRequestAnimationFrame     ||
        function(/* function */ callback){
          window.setTimeout(callback, 1000 / 60);
        }
	    );
		}();

		function initThree() {

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
			interval = setInterval(function() {
				randomizeParams();
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

			if(Math.random() < 0.2) {

				badTVParams.distortion = 0.1;
				badTVParams.distortion2 = 0.1;
				badTVParams.speed = 0;
				badTVParams.rollSpeed = 0;
				rgbParams.angle = 0;
				rgbParams.amount = 0;
				staticParams.amount = 0;

			} else {

				badTVParams.distortion = Math.random()*10+0.1;
				badTVParams.distortion2 = Math.random()*10+0.1;
				badTVParams.speed = Math.random()*0.4;
				badTVParams.rollSpeed = Math.random()*0.2;
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

			composer = new THREE.EffectComposer( renderer );
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

		function animateThree() {

			shaderTime += 0.1;
			badTVPass.uniforms[ 'time' ].value =  shaderTime;
			filmPass.uniforms[ 'time' ].value =  shaderTime;
			staticPass.uniforms[ 'time' ].value =  shaderTime;

			if ( video.readyState === video.HAVE_ENOUGH_DATA ) {
				if ( videoTexture ) {
					 videoTexture.needsUpdate = true;
				 }
			}

			threeFrame = requestAnimationFrame( animateThree );

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

	});

})(jQuery, this);
