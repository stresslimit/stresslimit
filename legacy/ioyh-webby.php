<?
/*
Template Name: IOYH
*/

$base_url = get_bloginfo('template_url') . '/' . basename(direname(__FILE__)) . '/ioyh-webby/';
$base_path = TEMPLATEPATH.'/ioyh-webby/';
$iphone = preg_match('/iphone/',strtolower(@$_SERVER['HTTP_USER_AGENT']));

// foursquare location stuff
include($base_path.'inc/4square.php');
fourSquare("user");
$history = fourSquare("history", array("l" => 1));
$foursquareisup = isset($history->checkins) ? true : false;
if($foursquareisup) {
  if (@$history->checkins[0]->venue->city == '') { $city = '?'; } else { $city = $city=@$history->checkins[0]->venue->city; }
  $date = date("M d, Y",strtotime(@$history->checkins[0]->created));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Stresslimit | Webby Awards - Julien Smith</title>
	<meta name="description" content="social capital, trust agents, all that jazz" />
	<link rel="icon" href="/favicon.png" type="image/x-icon">
  <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">
	<link rel='stylesheet' href='<?= $base_url ?>styles.css' type='text/css' media='all' />
	<link href='http://fonts.googleapis.com/css?family=Vollkorn:regular,italic,bold,bolditalic' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script type="text/javascript" src="<?= $base_url ?>js/jquery.event.drag-1.5.min.js"></script>
	<script type="text/javascript" src="<?= $base_url ?>js/js.js"></script>
	<!--[if IE 6]>
    <script src="<?= $base_url ?>js/ie6png.js"></script>
    <script>DD_belatedPNG.fix('img, #content .leftside, h3, h3.small, h3 a, h3.small a, h4, #eerieRedBall');</script>
    <style>
      #container {padding-top: 54px}
      #snapmenu ul li {width: 166px;}
    </style>  
  <![endif]-->
   <!--[if lt IE 9]>
    <style>
      h1, h2, h3, h4 {font-weight: normal}
      h4 {font-size: 14px;}
    </style>
   <![endif]-->   
</head>
<body>

	<div id="container">

		<div id="content">
			<div class="leftside">
			  <a href="http://stresslimitdesign.com" target="_blank"><img src="<?= $base_url ?>images/stresslogo.png" alt="Stresslimit Design" /></a>
				
      			<div id="eerieRedBall"><? if($foursquareisup) { ?><p><?=$date?></p><p>Right now, I’m in</p><p><span><?=$city?></span></p><? } ?></div>
            <a href="http://juliensmith.com" id="julien"></a>
			</div>
			<div class="rightside">
				<h1>Why Does <span><a href="http://inoveryourhead.net" class="visit">InOverYourHead</a></span> Deserve a Webby?</h1>
				<h2>Because it’s genuinely different.<br />Not for its own sake, but because Julien Smith is genuinely different too.</h2>
				
				<p>Co-author of the bestselling Trust Agents, Julien Smith is an infamously offbeat (and hugely popular) business consultant 
					and lifestyle engineer. </p>
				<p class="hr">StressLimit developed his personal blog, <a href="http://inoveryourhead.net">InOverYourHead</a>, to convey Julien’s 
					iconoclastic perspective on work, health and play.</p>

				<h3><a href="http://inoveryourhead.net" class="visit"><span>Visit</span> InOverYourHead.net</a></h3>

				<p>The blog’s design and navigation play with Julien’s obsessions and renegade personality. Many elements, such as Easter eggs 
					that seem nonsensical, are in fact hat tips to insider web and design culture… meant for Julien’s loyal followers.</p>

				<h4>Some reasons why we’re proud of this site:</h4>

				<p><em>Julien’s blog posts are consistently smart and provocative; his ideas perch on the bleeding edge of contemporary thought 
					about working and living more intelligently.</em></p>

				<p><em>Video interventions: Site visitors have a 1 in 50 chance of having mini-videos or random site backgrounds take over their 
					browsers. <a id="addsecretness" href="http://inoveryourhead.net/">Click here</a> to get a special preview of all the episodes.</em></p>
					<script type="text/javascript">
						$('#addsecretness').click(function(e){
							e.preventDefault();
							var url = $(this).attr('href') + 'super-secret-video-pa' + 'ge?auth=supersec' + 'retaccess'; /* why? Just to keep google out */
					        window.location = url;
						});
					</script>

			</div>
		</div> <!-- /content -->

		<div id="snapshots">
			<div id="snapwrap">
				<ul>
					<li><img src="<?= $base_url ?>images/snap_text-scroll.jpg" alt="" /></li>
					<li><img src="<?= $base_url ?>images/snap_different-background.png" alt="" /></li>
					<li><img src="<?= $base_url ?>images/snap_videos.jpg" alt="" /></li>
					<li><img src="<?= $base_url ?>images/snap_search-photoshop-joke.jpg" alt="" /></li>
					<li><img src="<?= $base_url ?>images/snap_404.jpg" alt="" /></li>
				</ul>
			</div>
			<div id="snapmenu">
				<ul>	<? /* really hacky way to flip bg image on li --> */ ?>
					<li class="active flipped"><span class="flipped">Note that blog text scrolls down the wall and disappears at the floor.</span></li>
					<li><span>The background appears differently, depending on your monitor size. Zoom in and out to see different views of Julien’s room.</span></li>
					<li><span>A hanging sign displays random messages, or counts mysteriously.</span></li>
					<li><span>Enter a nonsensical search term to land on an insider Photoshop joke.</span></li>
					<li><span>Go ahead… create a 404 error and see what happens.</span></li>
				</ul>
			</div>
		</div> <!-- /snapshots -->

		<div id="footer" class="clearfix">
			<div class="leftside">
				<a href="http://stresslimitdesign.com" target="_blank"><img src="<?= $base_url ?>images/stresslogo.png" alt="Stresslimit Design" /></a>
			</div>
			<div class="rightside">
				
				<h3 class="small"><a href="http://inoveryourhead.net"><span>Visit</span> InOverYourHead.net</a></h3>
				
				<h1>Who is 	<a href="http://stresslimitdesign.com" target="_blank" class="stress">StressLimit Design</a>?</h1>
				<p>Founded in 2003 by Colin Vernon and Justin Evans, Stresslimit helps organizations explore the power that exists at the 
					intersection between branding, web development and social media. Our clients range from small, independent publishers 
					to Fortune 500 companies.</p>
				<p class="hr copy">© 2011 StressLimit Design. All rights reserved.</p>
			</div>
		</div> <!-- /footer -->

	</div> <!-- /container -->

</body>
</html>