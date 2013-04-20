<?php
/*
Template Name: orange
*/

get_header(); ?>

	<div id="content">

		<div id="messages" class="">
			<div id="message_1" class="message">
				<p>We are currently rebuilding our website, to better showcase our work, vision and ideas. 	
					<script language="javascript" type="text/javascript">
						document.write('<a href="&#109;&#97;&#105;'+'&#108;&#116;&#111;:&#105;&#110;&#102;&#111;'+'@'+'&#115;&#116;&#114;&#101;&#115;&#115;&#108;&#105;&#109;&#105;&#116;&#100;&#101;&#115;&#105;&#103;&#110;'+'.'+'&#99;&#111;&#109;">'+'Click here'+'</a>');
					</script> if you would like to be notified when we go live with the full site.
				</p>
			</div>

			<div id="message_2" class="message white">
				<p><em>We don't build websites<br /> we build success stories.</em></p>
			</div>

			<div id="message_3_4" class="">

				<div id="message_3" class="message">
					<p>If you are curious to know more, simply click on the links below to see some of our recent and favorite work.</p>
				</div>

				<div id="message_4" class="message">
					<ul class="links">
						<li><a href="http://startcooking.com">startcooking</a></li>
						<li><a href="http://www.chrisbrogan.com/what-i-do/">Chris Brogan</a></li>
						<li><a href="http://inoveryourhead.net">Julien</a> <a href="http://juliensmith.com">Smith</a></li>
<? //					<li><a href="http://meylah.com">Meylah</a></li>?>
						<li><a href="http://www.youtube.com/watch?v=hvvFVhzDL6w">Environmental Defense Fund</a></li>
					</ul>
				</div>

			</div>
		</div>

		<div id="work"><a href="/">&bull; go home</a></div>

	</div><!-- content -->

</div>

<div id="orange">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
<?php endwhile; else: ?>
	<h2>This is orange.</h2>
<?php endif;

get_footer();
