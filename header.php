<!doctype html>
<?php
	if(is_ssl()) {
		$scheme = "https";
	} else {
		$scheme = "http";
	}
?>

<html <?php language_attributes(); ?> class="no-js">
	<head>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-31140322-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-31140322-1');
		</script>

		<meta charset="<?php bloginfo('charset'); ?>">
		<title>
			<?php wp_title(''); ?>
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
			document.createElement( "video" );
		</script>

	</head>
	<body>

		<section class="loader"></section>

		<section id="page" class="site-content">
			<div id="site-content-wrap" <?php body_class(); ?>>
