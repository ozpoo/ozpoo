(function ($, root, undefined) {

	$(function () {

		var $lastScrollTop, $scrollTop, $current, $flky, $options, $humans;

		$humans = [
			"strong",
			"worthy",
			"compelling",
			"compassionate",
			"understanding",
			"connected",
			"thoughtful",
			"caring",
			"chaotic",
			"simple",
			"friendly",
			"vulnerable",
			"unique",
			"daring",
			"remarkable",
			"different",
			"healing",
			"purposeful",
			"curious",
			"courageous",
			"hopefull",
			"inspiring",
			"innovative",
			"adventurous",
			"loving",
			"contemplative",
			"dedicated",
			"creative",
			"strategic",
			"unexpected",
			"quirky",
			"driven",
			"inventive",
			"passionate",
			"proud",
			"refined",
			"disheveled",
			"predictable",
		];

		$(document).ready(function() {

		});

		$(window).load(function() {
			init();
			animate();
		});


		$(window).resize(function() {

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
			AOS.init();
			reveal();
			setTimeout(function(){
				$(".intro").removeClass("show");
			}, 2800);
			setHumans();
		};

		var setSmoothState = function() {
			$options = {
				prefetch: true,
				scroll: false,
				cacheLength: 3,
				repeatDelay: 500,
				loadingClass: 'is-loading',
        anchors: 'a',
				blacklist: '.wp-link',
				onBefore: function($currentTarget, $container) { },
				onStart: {
          duration: 800,
          render: function ( $container ) {
						$container.addClass('is-exiting');
		        $smoothState.restartCSSAnimations();
						hide();
		        setTimeout(function(){
		          $container.html("");
		        }, 800);
          }
        },
				onProgress: {
			    duration: 0,
			    render: function ($container) {
						$(".loader").addClass("show");
					}
			  },
				onReady: {
			    duration: 800,
			    render: function($container, $newContent) {
						$(".loader").removeClass("show");
						if($(".flky").length) {
							$flky.flickity('destroy');
							console.log("destroy");
							$flky = "";
						}
						$container.removeClass('is-exiting');
						doScroll();
						setBackground($newContent);
						setTimeout(function($newContent) {
							$container.html($newContent);
							setFlky();
							setListeners();
							AOS.init();
							reveal();
						}, 800, $newContent);
					}
				},
        onAfter: function( $container, $newContent ) { }
      };
			$smoothState = $('#page').smoothState($options).data('smoothState');
		}

		var setBackground = function($newContent) {
			console.log($newContent);
			if($newContent.hasClass("home")) {
				$("body").attr("data-background", "home");
			} else if($newContent.hasClass("about")) {
				$("body").attr("data-background", "about");
			} else if($newContent.hasClass("contact")) {
				$("body").attr("data-background", "contact");
			} else {
				$("body").attr("data-background", "none");
			}
		};

		var reveal = function() {
			TweenLite.to($("#site-content-wrap"), 0, {autoAlpha:1, delay:0});
			if(!Cookies.get('stdio-promo')) {
				setTimeout(function(){
					$(".modal-promotion").addClass("show");
					Cookies.set('stdio-promo', 'nailed-it', { expires: 7 });
				}, 8000);
			}
		};

		var hide = function() {
			TweenLite.to($("#site-content-wrap"), .4, {autoAlpha:0, delay:0});
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

		var doScroll = function(direction) {
		  $("html, body").animate({
		    scrollTop: $scrollTo + "px"
		  }, 10);
		  $scrollTo = history.state.scrollTop;
		};

		var animate =  function() {
			requestAnimationFrame( animate );
			$scrollTop = $(document).scrollTop();
			if($(document).height() - $scrollTop < $(window).height() * 1.5) {
				setMenuTransform("up");
			} else {
				switch (getDirection()) {
					case "up":
						setMenuTransform("up");
						break;
					case "down":
						setMenuTransform("down");
						break;
					default:
						break;
				}
			}
			$lastScrollTop = $scrollTop;
		};

		var getDirection = function() {
			var direction;
			if($lastScrollTop < $scrollTop && $scrollTop > 0){
				direction = "down";
			} else if($lastScrollTop > $scrollTop && $scrollTop > 0) {
				direction = "up";
			} else {
				direction = null;
			}
			return direction;
		};

		var setListeners = function() {
			$('.button--previous').on( 'click', function() {
				console.log($flky);
			  $flky.previous();
			});
			$('.button--next').on( 'click', function() {
			  $flky.next();
			});
		};

		var setFlky = function() {
			if($(".flky").length) {
				$flky = new Flickity('.flky', {
					fullscreen: true,
					accessibility: true,
					adaptiveHeight: false,
					autoPlay: false,
					cellAlign: 'center',
					cellSelector: undefined,
					contain: false,
					draggable: true,
					dragThreshold: 3,
					freeScroll: false,
					selectedAttraction: 0.1,
					friction: 1,
					groupCells: false,
					initialIndex: 1,
					lazyLoad: false,
					percentPosition: true,
					prevNextButtons: false,
					pageDots: false,
					resize: true,
					rightToLeft: false,
					setGallerySize: true,
					watchCSS: false,
					wrapAround: true
				});
			}
		}

		var setMenuTransform = function(direction) {
			if(direction == "up" && $current != "show") {
				$(".logo, .menu-main").addClass("show");
				$current = "show";
			} else if(direction == "down" && $current != "hide") {
				$(".logo, .menu-main").removeClass("show");
				$current = "hide";
			}
		};

		var setHumans = function() {
			setInterval(function(){
				if($(".about").length) {
					var item = $humans[Math.floor(Math.random()*$humans.length)];
					$(".wordz").html(item);
				}
			}, 2800);
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

	});

})(jQuery, this);
