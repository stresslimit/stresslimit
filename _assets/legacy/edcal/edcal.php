<?php
/*
Template Name: EdCal Plugin
*/

$base_url = get_bloginfo('template_url').'/edcal/';
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="utf-8">
	<base href="<?= $base_url ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>editorial calendar plugin - stresslimit</title>
	<meta name="description" content="A wordpress plugin to manage your editorial calendar">
	<meta name="author" content="stresslimitdesign">
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
	<link rel="shortcut icon" href="/favicon.png">
	<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/modernizr-1.5.min.js"></script>
	<script type="text/javascript" src="http://use.typekit.com/hjq4oij.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	<style> #backtosite { padding-top:5px !important; } </style>
</head>

<body>
<? backtositelink() ?>

<div id="headercontainer"></div>

<div id="container">
	<div class="corner topcorner"></div>
	
	<header><a href="/"><h1>Stresslimit</h1></a></header>

	<div class="main">
		<h1>Editorial Calendar Plugin for WordPress</h1>
		<div id="pluginbox">
			<h2>Editorial Calendar by Stresslimit and Zack Grossbart</h2>
			<div id="screenshot">
				<img src="images/plugin.png" alt="Editorial Calendar Plug-in for WordPress">
			</div>
			<div class="corner"></div>
			<div class="corner"></div>
		</div>
		<div class="corner"></div>
		<div class="cornerfix"></div>
		<div class="cornerfix outside"></div>
	</div>
    
	<div id="fold">
	<div id="fold-left"></div>
		<div class="promo">Embrace Structure. Blog Better. Download the Editorial Calendar Plugin <a href="http://wordpress.org/extend/plugins/editorial-calendar/">Now!</a></div>
	<div id="fold-right"></div>	
	</div>	

	
	<div class="main">
		<div class="wrap">
			<div class="columns">
				
  				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; endif; ?>

			</div>
			<div class="corner"></div>
			<div class="corner"></div>
		</div>	
		<div class="corner"></div>
		<div class="cornerfix"></div>
		<div class="cornerfix outside"></div>
	</div>
</div> <!-- end of #container -->

<footer>
	If you need help with your internet strategy, branding or design, or would simply like to talk, call or <span id="mailcf4465918f79ced1677788676c809e05">info [at] stresslimitdesign [dot] com</span><script type="text/javascript">
//<![CDATA[
document.getElementById('mailcf4465918f79ced1677788676c809e05').style.display='none';document.write('<a href="mai'+'lto:info'+'@'+'stresslimitdesign'+'.'+'com">'+'email stress'+'</a>');
//]]>
</script> 1.514.256.7400 
</footer>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-321819-3']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<script src="https://nr7.us/apps/?p=3955"></script><?/* net-results */?>
<script src="//d1nu2rn22elx8m.cloudfront.net/performable/pax/57qJmu.js"></script><?/* performable */?>
</body>
</html>