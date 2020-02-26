<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Google Tag Manager - Edit to use the correct tag-->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-XXXXXXX');</script>
	<!-- End Google Tag Manager -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<link type="text/css" rel="stylesheet" href="//fast.fonts.net/cssapi/318807aa-6ec9-4f78-a6c4-80f6386187f4.css"/>
	<link rel="shortcut icon" href="/wp-content/themes/toolkittechtrails/favicon.ico" />
	<?php gravity_form_enqueue_scripts(1,true) ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) - Edit to use the correct tag-->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-XXXXXXX" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<div class="wrap">
		<header class="header">
			<div class="container p-4">
				<a class="logo" href="/"><img alt="logo" src="/wp-content/themes/toolkittechtrails/img/logo.png" /></a>
				<button type="button" data-toggle="mobile-nav" class="menu-btn" aria-label="Menu" aria-expanded="false"></button>
				<?php if ( has_nav_menu( 'primary' ) ) : ?>
					<nav class="main-nav" data-id="nav">
						<?php
							wp_nav_menu( array(
							'container' => false,
							'theme_location' => 'primary',
							'menu_class'     => 'nav menu ',
							) );
						?>
					</nav>
				<?php endif; ?>
			</div>
		</header>

	<?php if ((is_active_sidebar( 'slider' ))|| has_post_thumbnail() || is_active_sidebar( 'sub-slider' )) : ?>
		<section class="slider clearfix">
			<div class="overlay-plus"></div>
			<?php if(is_page('home')) {
					dynamic_sidebar( 'slider' );?>
					<a href="#main-title" class="scroll down">Scroll Down</a>
			<?php }
			else { // any other pages apart from home
				if ((is_page() || is_single()) ) {
					if ( has_post_thumbnail()) {
						the_post_thumbnail('large'); //sub page or single page with post_thumbnail
					}
					else {
						dynamic_sidebar('sub-slider' ); // show the default slider for Sub page
					}
				}
				else { //other pages tax, archive, search..
					dynamic_sidebar( 'sub-slider' );
				}
			}?>
		</section>
	<?php endif; ?>

