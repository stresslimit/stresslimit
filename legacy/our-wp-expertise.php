<?
/*
Template Name: Our WP Expertise
*/

/*
// password stuff to remove
if($pw = @$_POST['pw']) {
	if($pw=='secret') {
		setcookie('frig');
		header('Location: /about-our-wordpress-expertise',1);
	} else {
		echo 'sorry';
	}
	die();
}
if(!isset($_COOKIE['frig'])) {
?>
	<form action="" method="post">
		<label>enter password</label>
		<input type="password" name="pw">
		<input type="submit" value="enter">
	</form>
<?
	die();
}
// password stuff to remove
*/

$base_url = get_bloginfo('template_url') . '/' . basename(dirname(__FILE__)) .'/our-wp-expertise/';

?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Stresslimit loves WordPress</title>
	<link rel="icon" href="/favicon.png" type="image/x-icon" />
	<link rel="shortcut icon" href="/favicon.png" type="image/x-icon" />
	<link href="http://fonts.googleapis.com/css?family=Nobile:regular,italic,bold,bolditalic" rel="stylesheet" type="text/css">
	<link href="<?php echo $base_url ?>museo900.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $base_url ?>league.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $base_url ?>style.css" rel="stylesheet" type="text/css">
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<script type="text/javascript" src="js/selectivizr.js"></script>
	<![endif]-->
	<script src="http://code.jquery.com/jquery-1.5.2.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<script>var TEMPLATE_PATH = '<?php echo $base_url ?>';</script>
	<script src="<?php echo $base_url ?>js/scrollTo.js"></script>
	<script src="<?php echo $base_url ?>js/dragdealer.js"></script>
	<script src="<?php echo $base_url ?>js/wp.js"></script>
</head>

<!--
       ___                               
     /\__\                       /\  \         /\__\         /\__\         /\__\                                   /\  \                              
    /:/ _/_         ___         /::\  \       /:/ _/_       /:/ _/_       /:/ _/_                     ___         |::\  \       ___           ___     
   /:/ /\  \       /\__\       /:/\:\__\     /:/ /\__\     /:/ /\  \     /:/ /\  \                   /\__\        |:|:\  \     /\__\         /\__\    
  /:/ /::\  \     /:/  /      /:/ /:/  /    /:/ /:/ _/_   /:/ /::\  \   /:/ /::\  \   ___     ___   /:/__/      __|:|\:\  \   /:/__/        /:/  /    
 /:/_/:/\:\__\   /:/__/      /:/_/:/__/___ /:/_/:/ /\__\ /:/_/:/\:\__\ /:/_/:/\:\__\ /\  \   /\__\ /::\  \     /::::|_\:\__\ /::\  \       /:/__/     
 \:\/:/ /:/  /  /::\  \      \:\/:::::/  / \:\/:/ /:/  / \:\/:/ /:/  / \:\/:/ /:/  / \:\  \ /:/  / \/\:\  \__  \:\~~\  \/__/ \/\:\  \__   /::\  \     
  \::/ /:/  /  /:/\:\  \      \::/~~/~~~~   \::/_/:/  /   \::/ /:/  /   \::/ /:/  /   \:\  /:/  /   ~~\:\/\__\  \:\  \        ~~\:\/\__\ /:/\:\  \    
   \/_/:/  /   \/__\:\  \      \:\~~\        \:\/:/  /     \/_/:/  /     \/_/:/  /     \:\/:/  /       \::/  /   \:\  \          \::/  / \/__\:\  \   
     /:/  /         \:\__\      \:\__\        \::/  /        /:/  /        /:/  /       \::/  /        /:/  /     \:\__\         /:/  /       \:\__\  
     \/__/           \/__/       \/__/         \/__/         \/__/         \/__/         \/__/         \/__/       \/__/         \/__/         \/__/  
     
     looking for an easter egg? goto http://stresslimitdesign.com/ascii/
 -->

<body>
<?php // backtositelink() ?>
<!-- <div class="contain"> -->

	<a id="logo" href="http://stresslimitdesign.com/"></a>


	<header>
		<div>
		<span class="wp parallax" data-offset="0.5">wordpress</span>
		<h1 class="parallax" data-offset="4">Stresslimit &hearts;</h1>
		<p class="parallax" data-offset="2">Since the early days of blogging we've kept an eye on WordPress. We watched it grow from being the site that launched a million blogs into a robust CMS that fits any application or client need we can throw it at. The launch of WP 3.0 only served to turn our affection for WP into a full fledged love affair. Now,</p>
		<h2 class="parallax" data-offset="1.5">Stresslimit lives <span>&amp;</span> breathes WordPress</h2>
		<h3 class="parallax" data-offset="1.1">Check out where and how below:</h3>
		</div>
	</header>



	<menu>
		<div>
		<a href="#plugins">PLUGINS</a>
		<a href="#work">CLIENT WORK</a>
		<a href="#contact"><span>our</span> MOKITA <span>rules</span></a>
		<a href="#" class="totop"><?//↑?>☝</a>
		</div>
	</menu>



	<section id="plugins">
		<div>


<!-- <h5>Respecting the open source culture from which WordPress was born, we decided to give back. 
Here's some of our more popular contributions to the cause:</h5>
 -->
		<nav>
			<a href="" class="sel one">1</a>
			<a href="" class="two">2</a>
			<a href="" class="three">3</a>
		</nav>

		<div class="page one">
			<div class="screenshot">
				<a href="http://stresslimitdesign.com/editorial-calendar-plugin"><img src="<?php echo $base_url ?>images/screenshot_edcal.png"></a>
				<p class="caption">“We think it rocks.” —<a href="http://www.copyblogger.com/">Copyblogger</a></p>
			</div>
			<div class="content">
				<h2><a href="http://stresslimitdesign.com/editorial-calendar-plugin">WordPress Editorial Calendar</a></h2>
				<h4>in collaboration with <a href="http://www.zackgrossbart.com/blog/more-about-zack">Zack Grossbart</a></h4>
				<p>From nearly a decade of coaching bloggers, we've learned that the single biggest contributor to success is a well-strategized editorial calendar. The lack of a blog-based content planning solution drove us to build our own: the <a href="http://stresslimitdesign.com/editorial-calendar-plugin">WordPress Editorial Calendar</a>.</p>
				<p>Our free plugin lets you organize, plan, and strategize content with an easy to use drag-and-drop interface. And, it works with any kind of custom content you create.</p>
				<p>We're proud of the fact that it's been downloaded by over 45,000 people and that some of the biggest blogs on the web (including <a href="http://www.chrisbrogan.com/">Chris Brogan</a> and <a href="http://www.copyblogger.com/">Copyblogger</a>) are running on it.</p>
				<p>Above this, we're very proud to be helping thousands of people blog smarter and better.</p>
			</div>
			<a href="http://stresslimitdesign.com/editorial-calendar-plugin" class="button">Read more: WordPress Editorial Calendar</a>
		</div>

		<div class="page two">
			<div class="screenshot">
				<a href="http://wordpress.org/extend/plugins/wp-super-mailer/"><img src="<?php echo $base_url ?>images/screenshot_wpsupermailer.png"></a>
				<p class="caption">Winner of 2nd prize at <a href="http://mtl.hackdays.ca/">Hackdays’ HackMtl</a></p>
			</div>
			<div class="content">
				<h2><a title="WP SuperMailer" href="http://wordpress.org/extend/plugins/wp-super-mailer/">WordPress SuperMailer</a></h2>
				<h4>in collaboration with <a href="http://twitter.com/#!/mjangda">@mjangda</a></h4>
				<p>Want an easy way for blog subscribers to receive your posts automatically by email?</p>
				<p>Want to manage your subscriber lists dynamically within your WordPress interface?</p>
				<p>Want to integrate with Net-Results, CakeMail or MailChimp?</p>
				<p>Now you can with our WordPress SuperMailer.</p>
				<p>The SuperMailer supports custom post types and enables you to make your own templates. For developers, we have created a well-documented API that allows advanced interactions with your mailing engine of choice.</p>
			</div>
			<a href="http://wordpress.org/extend/plugins/wp-super-mailer/" class="button">Read more: WP SuperMailer</a>
		</div>

		<div class="page three">
			<div class="screenshot">
				<a href="http://digitalize.ca/wordpress-plugins/custom-metadata/"><img src="<?php echo $base_url ?>images/screenshot_metamanager.png"></a>
				<p class="caption">Warning: Developers only!</p>
			</div>
			<div class="content">
				<h2><a href="http://wordpress.org/extend/plugins/custom-metadata/">Custom Metadata Manager</a></h2>
				<h4>in collaboration with <a href="http://twitter.com/#!/mjangda">@mjangda</a></h4>
				<p>With the addition of custom content types in version 3.0, WordPress is even more useful as a CMS for complicated websites, not just simple blogs.</p>
				<p>There are metafield plugins, but most use a graphical user interface, meaning that the data about your custom fields and types are stored in your database. In development, when you may often delete, re-install or move your database around a lot, it is very useful to have your custom setup all in trackable, versionable code.</p>
				<p>Enter the Custom Metadata Manager which provides a simple API to add meta fields to posts, pages, users and any custom content types you create.</p>
			</div>
			<a href="http://wordpress.org/extend/plugins/custom-metadata/" class="button">Read more: Custom Metadata Manager</a>
		</div>

		</div>
	</section>



	<section id="work">
		<div>

		<nav>
			<a href="" class="sel one">1</a>
			<a href="" class="two">2</a>
			<a href="" class="three">3</a>
		</nav>

		<div class="page one">
			<div class="screenshot">
				<a href="http://inoveryourhead.net"><img src="<?php echo $base_url ?>images/screenshot_inoveryourhead.png"></a>
				<h4>Client: Best-selling author and lifestyle consultant Julien Smith</h4>
			</div>
			<div class="content">
				<h2><a href="http://inoveryourhead.net">In Over Your Head</a></h2>
				<p>When bestselling author and web marketing guru <a href="http://juliensmith.com">Julien Smith</a> asked us to help revamp his online presence, the only option was WordPress.</p>
				<p>Knowing Julien is a master blogger and social strategist, WordPress was the obvious choice as the most powerful toolkit we could provide him. As well as giving him the tools he needed to expand his reach, WordPress was also an ideal platform for us to push the boundaries of what a blog design could be, and what kinds of complex front-end behaviours we could explore. Dynamic flash-based video interventions and insider design and code joke easter eggs are just the beginning… Just don't push the radiator cap!</p>
			</div>
			<a href="http://inoveryourhead.net" class="button">Visit inoveryourhead.net</a>
		</div>

		<div class="page two">
			<div class="screenshot">
				<a href="http://trustedadvisor.com"><img src="<?php echo $base_url ?>images/screenshot_taa.png"></a>
				<h4>Client: Global consultant and author Charles H. Green</h4>
			</div>
			<div class="content">
				<h2><a href="http://trustedadvisor.com">Trusted Advisor Associates</a></h2>
				<p>Originally built on our custom CMS quite a few years back, we recently built a custom importer and moved all 900+ posts and articles over to WordPress.</p>
				<p>We used the power of custom post types and custom meta boxes to better organize the Trusted Advisor site content, as well as hooking into sophisticated 3rd party tracking and marketing automation services.</p>
				<p>With the customized training we gave them, the team over at Trusted Advisor can now easily add new posts and perform all of their tasks. Though we remain their tech team, they can manage all aspects of their web strategies themselves.</p>
			</div>
			<a href="http://trustedadvisor.com" class="button">Visit trustedadvisor.com</a>
		</div>

		<div class="page three">
			<div class="screenshot dst">
				<?//<a href="">?><img src="<?php echo $base_url ?>images/screenshot_dst.png"><?//</a>?>
				<h4>Client: A Confidential Global Company</h4>
			</div>
			<div class="content">
				<h2>A Fortune-Rated Corporation</h2>
				<p>Enterprise marketing departments are often restricted by complex relationships to IT security concerns. Security mandates, firewalls, and complex hosting issues have created an environment that restricts content management to IT departments, making it difficult for sales and marketing staff to create and iterate content that responds to the market.</p>
				<p>After providing a significant study on security and viability, we were able to move one of our most important clients from a complex and very restricted IT driven environment, to a highly agile, marketing-driven solution we created for them in WordPress. This new solution allows the company to participate comfortably in the social and dynamic environment of today’s web, while feeling secure and comfortable with their choice of platform.</p>
			</div>
		</div>

		</div>
	</section>



	<section id="contact">
		<div>
			<form action="" method="post">
				<p>Drop us a line, we’d love to hear from you!</p>
			  <p class="error"></p>
				<label for="name">Your name</label>
				<input type="text" name="name" id="name">
				<label for="">Your email</label>
				<input type="email" name="email" id="email">
				<label for="">Your message</label>
				<textarea name="message" id="message"></textarea>
				<div id="comment-slider" class="dragdealer">
					<div class="handle">SLIDE TO SEND&nbsp; <span>☞</span></div>
				</div>
			</form>

			<h2>Our Mokita Rules</h2>
      
        <img id="mokita" src="<?php echo $base_url ?>/images/mokita.png" alt="Stresslimit's Mokita" />
      <p>Mokita isn’t something we’ve made with WordPress—it’s the best espresso machine in east Montreal, and it lives in our office.</p>
			<p>Visit us, and we'll not only prove it to you but we’ll also be happy to discuss your next project.</p>

			<h3 class="stresslimit">Stresslimit</h3>
			<p class="adresse">4831 Ste-Catherine E, Montréal QC &nbsp;H1V 1Z7<br>
			<span>(email)</span> <span id="mail94dfa893df23701883b18b8d16788354">info [at] stresslimitdesign [dot] com</span>
			<script language="javascript" type="text/javascript">
	//<![CDATA[
	document.getElementById('mail94dfa893df23701883b18b8d16788354').style.display='none';document.write('<a href="mai'+'lto:info'+'@'+'stresslimitdesign'+'.'+'com">'+'info'+'@'+'stresslimitdesign'+'.'+'com'+'</a>');
	//]]>
			</script><br>
				<span>(twitter)</span> <a href="http://twitter.com/stresslimit">@stresslimit</a><br>
				<span>(tel)</span> 514.256.7400
			</p>
		</div>
	</section>


<!-- </div> -->

<img id="logo_lg" src="<?php echo $base_url ?>images/logo_lg.png">
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
<script src="https://nr7.us/apps/?p=3955"></script><script src="//d1nu2rn22elx8m.cloudfront.net/performable/pax/57qJmu.js"></script>
</body>
</html>