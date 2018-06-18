<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title>
			<?php wp_title(''); ?><?php if (wp_title('', false)) { echo ' | '; } ?><?php bloginfo('name'); ?>
		</title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/img/fav.png" rel="shortcut icon">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/img/icon.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta name="format-detection" content="telephone=no">
		<meta name="keywords" content="PR, Public, Public Relations, Seattle, Washingtion, WA, SEA, Good, Media, Press">

		<meta property="og:title" content="<?php bloginfo('name'); ?>">
		<meta property="og:description" content="<?php bloginfo('description'); ?>">
		<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/img/share.jpg">
		<meta property="og:url" content="<?php echo home_url($wp->request); ?>">
		<meta name="twitter:card" content="summary_large_image">

		<?php wp_head(); ?>

		<script>
			document.createElement( "picture" );
		</script>

	</head>
	<body>

		<section class="intro show">
			<svg version="1.1"
				 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
				 x="0px" y="0px" width="354.1px" height="103.1px" viewBox="0 0 354.1 103.1" style="enable-background:new 0 0 354.1 103.1;"
				 xml:space="preserve">
			<path class="st2" d="M0,35.5C0,16.9,15,1.7,33.8,1.7s33.9,15.2,33.9,33.8c0,18.8-15.2,33.9-33.9,33.9S0,54.3,0,35.5z M50.5,35.5
				c0-9-7.4-16.5-16.6-16.5c-9.2,0-16.6,7.4-16.6,16.5c0,9.2,7.4,16.6,16.6,16.6C43.1,52.2,50.5,44.7,50.5,35.5z"/>
			<path class="st2" d="M69.4,19.2V2.7h59.2L101.8,52H128v16.5H70.6l28.6-49.3H69.4z"/>
			<path class="st2" d="M153.8,103.1h-17.3V2.7h17.3v5.2c0,0,6-6.1,16.8-6.1c18.8,0,33.4,15.2,33.4,33.9c0,18.8-14.6,33.9-33.4,33.9
				c-10.8,0-16.8-6.1-16.8-6.1V103.1z M170.3,19c-9.2,0-16.5,7.3-16.5,16.6c0,9.3,7.3,16.6,16.5,16.6c9.2,0,16.4-7.3,16.4-16.6
				C186.7,26.3,179.5,19,170.3,19z"/>
			<path class="st2" d="M210.3,35.5c0-18.6,15-33.8,33.8-33.8S278,16.9,278,35.5c0,18.8-15.2,33.9-33.9,33.9S210.3,54.3,210.3,35.5z M260.9,35.5
				c0-9-7.4-16.5-16.6-16.5c-9.2,0-16.6,7.4-16.6,16.5c0,9.2,7.4,16.6,16.6,16.6C253.4,52.2,260.9,44.7,260.9,35.5z"/>
			<path class="st2" d="M295.9,61.8c5.9,4.9,13.4,7.8,21.7,7.8c18.6,0,33.8-15.2,33.8-34c0-8.2-2.9-15.7-7.8-21.6l10.5-10.5L350.5,0l-10.4,10.4
				c-6-5.4-13.9-8.6-22.5-8.6c-18.8,0-34,15-34,33.8c0,8.7,3.3,16.6,8.7,22.6l-9.3,9.3l3.6,3.6L295.9,61.8z M300.9,35.8
				c0-9.2,7.5-16.6,16.6-16.6c3.8,0,7.4,1.4,10.2,3.7L304.5,46C302.3,43.2,300.9,39.7,300.9,35.8z M308.2,49.5l23.1-23.1
				c1.8,2.7,2.8,5.9,2.8,9.3c0,9.2-7.5,16.6-16.5,16.6C314.1,52.4,310.9,51.3,308.2,49.5z"/>
			</svg>
		 </section>

		<section class="loader">Loading...</section>
		<section class="modal-promotion"></section>

		<section id="page" class="site-content">
			<div id="site-content-wrap" <?php body_class(); ?>>
				<header class="header sticky" data-aos="fade-down" data-aos-offset="0" data-aos-easing="ease" data-aos-duration="800">
					<div class="logo">
						<p>
							<a href="<?php echo site_url('/', 'http'); ?>">
								<svg version="1.1"
									 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
									 x="0px" y="0px" width="354.1px" height="103.1px" viewBox="0 0 354.1 103.1" style="enable-background:new 0 0 354.1 103.1;"
									 xml:space="preserve">
								<path class="st1" d="M0,35.5C0,16.9,15,1.7,33.8,1.7s33.9,15.2,33.9,33.8c0,18.8-15.2,33.9-33.9,33.9S0,54.3,0,35.5z M50.5,35.5
									c0-9-7.4-16.5-16.6-16.5c-9.2,0-16.6,7.4-16.6,16.5c0,9.2,7.4,16.6,16.6,16.6C43.1,52.2,50.5,44.7,50.5,35.5z"/>
								<path class="st1" d="M69.4,19.2V2.7h59.2L101.8,52H128v16.5H70.6l28.6-49.3H69.4z"/>
								<path class="st1" d="M153.8,103.1h-17.3V2.7h17.3v5.2c0,0,6-6.1,16.8-6.1c18.8,0,33.4,15.2,33.4,33.9c0,18.8-14.6,33.9-33.4,33.9
									c-10.8,0-16.8-6.1-16.8-6.1V103.1z M170.3,19c-9.2,0-16.5,7.3-16.5,16.6c0,9.3,7.3,16.6,16.5,16.6c9.2,0,16.4-7.3,16.4-16.6
									C186.7,26.3,179.5,19,170.3,19z"/>
								<path class="st1" d="M210.3,35.5c0-18.6,15-33.8,33.8-33.8S278,16.9,278,35.5c0,18.8-15.2,33.9-33.9,33.9S210.3,54.3,210.3,35.5z M260.9,35.5
									c0-9-7.4-16.5-16.6-16.5c-9.2,0-16.6,7.4-16.6,16.5c0,9.2,7.4,16.6,16.6,16.6C253.4,52.2,260.9,44.7,260.9,35.5z"/>
								<path class="st1" d="M295.9,61.8c5.9,4.9,13.4,7.8,21.7,7.8c18.6,0,33.8-15.2,33.8-34c0-8.2-2.9-15.7-7.8-21.6l10.5-10.5L350.5,0l-10.4,10.4
									c-6-5.4-13.9-8.6-22.5-8.6c-18.8,0-34,15-34,33.8c0,8.7,3.3,16.6,8.7,22.6l-9.3,9.3l3.6,3.6L295.9,61.8z M300.9,35.8
									c0-9.2,7.5-16.6,16.6-16.6c3.8,0,7.4,1.4,10.2,3.7L304.5,46C302.3,43.2,300.9,39.7,300.9,35.8z M308.2,49.5l23.1-23.1
									c1.8,2.7,2.8,5.9,2.8,9.3c0,9.2-7.5,16.6-16.5,16.6C314.1,52.4,310.9,51.3,308.2,49.5z"/>
								</svg>
							</a>
						</p>
					</div>
					<nav class="menu-main">
						<ul>
							<li><a href="<?php echo site_url('/about', 'http'); ?>">About</a></li>
							<li><a href="<?php echo site_url('/contact', 'http'); ?>">Contact</a></li>
						</ul>
					</nav>
				</header>
