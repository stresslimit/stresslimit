<!DOCTYPE html>
<!--

 .d8888b. 88888888888 8888888b.  8888888888 .d8888b.   .d8888b.  888      8888888 888b     d888 8888888 88888888888 
d88P  Y88b    888     888   Y88b 888       d88P  Y88b d88P  Y88b 888        888   8888b   d8888   888       888     
Y88b.         888     888    888 888       Y88b.      Y88b.      888        888   88888b.d88888   888       888     
 "Y888b.      888     888   d88P 8888888    "Y888b.    "Y888b.   888        888   888Y88888P888   888       888     
    "Y88b.    888     8888888P"  888           "Y88b.     "Y88b. 888        888   888 Y888P 888   888       888     
      "888    888     888 T88b   888             "888       "888 888        888   888  Y8P  888   888       888     
Y88b  d88P    888     888  T88b  888       Y88b  d88P Y88b  d88P 888        888   888   "   888   888       888     
 "Y8888P"     888     888   T88b 8888888888 "Y8888P"   "Y8888P"  88888888 8888888 888       888 8888888     888     

-->
<html>
<head>
<meta charset="utf-8"> 
<title><?php wp_title( ' | ', true, 'right' ) ?>Stresslimit Design</title>
<meta name="description" content="Nice to meet you. We’re Stresslimit. We build magnificent websites. Web design. Content. Digital strategy. What do you do?" /> 
<link rel="icon" href="<?php bloginfo('template_url') ?>/favicon.png" type="image/x-icon">

<script type="text/javascript" src="http://use.typekit.com/rgd0rca.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<script type="text/javascript" src="http://fast.fonts.net/jsapi/9a23a401-e757-435b-9eaf-8aba56078ece.js"></script>

<?php wp_head() ?>

<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<script src="js/selectivizr.js"></script>
<![endif]-->

</head>
<body <?php body_class() ?>>

	<header>

		<div id="menu" class="clearfix no-transition fixed">
			<div class="container">
				<a id="logo" href="/" title="Stresslimit Website Design, Montreal" class="chipped"></a>
				<nav>
					<?php wp_nav_menu( array( 'menu'=>'header menu', 'container'=>'' ) ) ?>
				</nav>
			</div>
		</div>

		<?php if ( is_home() || is_page('home') ) : ?> 
		<div id="meet-stress">
			<!-- <h4>We are an open agency that helps organizations find their voice.</h4> -->
			<h3>We are pioneers, advocates and optimists.</h3>
			<h2>We create for the web and beyond.</h2>
			<h1>Meet Stresslimit Design.</h1>
		</div>
		<?php endif; ?>

		<?php /* <div id="stop--bannertime" class="container">
			<img class="left" src="<?php bloginfo('template_url') ?>/images/logos/stress_clear.png" style="bottom:45px;-webkit-transform: rotate(-19deg);left:26px;">

			<div style="margin-left:340px;width:550px">
				<h1>Meet Stresslimit Design</h1>
				<p>We are small and agile, we're committed to quality and innovation, and we guarantee to deliver something you love.</p>
				<p>We create for the web and beyond.</p>
				<p style="text-align:right"><a class="ribbon" href="mailto:info@stresslimitdesign.com">Want to work together?</a></p>
			</div>
		</div> */ ?>

	</header>

	<div id="main"<?php if ( !is_home() && !is_page('home') ) : ?> class="container"<?php endif; ?>>
