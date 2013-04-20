<?php get_header(); ?>

		<section id="about">
			<div class="container">
				<div class="fractional clearfix">
					<div class="third">
						<h3 class="dual stripe">Who We<br />Are</h3>
						<?php 
							if (have_posts()) : while (have_posts()) : the_post();
							//	the_content();
							endwhile; endif;

							// this will eventually be in WP somewheres:
						?>
						<p>We’re veteran designers and creators of digital experiences, always at the forefront of what’s possible with changing technologies.</p>
						<p>Stresslimit has built a reputation on forward-thinking, engaged and human-centred design strategy, backed up by solid no-nonsense production.</p>
					</div>
					<div class="third">
						<h3 class="dual stripe">What We<br />Do</h3>
						<ul>
							<li>Marketing Strategy</li>
							<li>Project Planning</li>
							<li>User Experience Design</li>
							<li>Interaction Design</li>
							<li>Visual Design</li>
							<li title="For example: html, css, javascript, php, jquery, WordPress, Ruby on Rails, node.js">Code</li>
							<li>Communication &amp; Social Media</li>
							<li>Operational Strategy</li>
							<li>Research &amp; Analytics</li>
						</ul>
					</div>
					<div class="third">
						<h3 class="dual stripe">What We<br />Work On</h3>
						<ul>
							<li><a href="http://pressbooks.com">PressBooks</a></li>
							<li><a href="/about-our-wordpress-expertise">We ♥ WordPress: <br>About Our WordPress Expertise</a></li>
							<li><a href="/editorial-calendar-plugin">Open Source WordPress Editorial Calendar Plugin</a></li>
							<li><a href="/labs">WordPress Plugins</a></li>
							<!-- <li><a href=""></a></li> -->
							<!-- <li><a href="/power-of-scale">Making a Tilt-Shift Animation: <br>The Power of Scale</a></li> -->
						</ul>
						<?php sld_projects(); ?>
					</div>
				</div>
			</div>
		</section>

		<section id="been-up-to">
			<div class="container">
				<h2 class="stripe"><span>What We've Been Up To</span></h2>
				<h4 class="tagline">We make the world a better place by crafting beautiful websites with ultra-clean code.</h4>
				<div class="fractional clearfix">
				<?php
					$posts = get_posts( array( 'post_type'=>'post', 'numberposts' => 5 ) );
					$i = 2;
					foreach ( $posts as $post ) : 
						setup_postdata($post);
						$class = ($i) ? 'half' : 'third';
						$size = ($i) ? 'medium' : 'thumbnail';
				?>
					<article class="<?php echo $class ?>">
						<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
						<h5><?php the_date() ?> &bull; by <?php the_author() ?></h5>
						<?php if ( has_post_thumbnail( $post->ID ) ) : ?>
						<div class="thumbnail"><a href="<?php the_permalink() ?>"><?php echo get_the_post_thumbnail( $post->ID, $size ) ?></a></div>
						<?php endif; ?>
						<?php ($i) ? the_excerpt() : ''; ?> 
					</article>

				<?php
					if ($i == 1) echo '
				</div>
				
				<hr class="stripe" />
				
				<div class="fractional clearfix">';
					$i = $i>>1;
					endforeach;
				?> 
				</div>
				<div class="more">
					<a class="button" href="<?php echo home_url(); ?>/blog">More Posts</a>
				</div>
			</div>
		</section>

		<section id="projects" class="grey">
			<div class="container">
				<h2><span>Work</span></h2>
				<h4 class="tagline">Stresslimit has been designing digital experiences since before you had an email address.</h4>

				<div class="fractional clearfix">
					<?php
						$projects = get_posts( array('numberposts'=>3 , 'category'=>'30,35' ) );
						foreach($projects as $post) : 
							setup_postdata($post);
					?>
					<article class="third">
						<a href="<?php the_permalink(); ?>">
							<h3><?php the_title() ?></h3>
							<?php if (has_post_thumbnail() ) the_post_thumbnail() ?>
						</a>
					</article>
					<?php 
						endforeach;
					?>

				</div>

				<div class="client-logos">
				<?php
					$logos = array( 'wpvip', 'fed', 'tc', 'ms', 'cc' );
					foreach ( $logos as $logo ) { ?><img src="<?php bloginfo('template_url') ?>/images/logos/clients/logo-<?php echo $logo ?>.png" alt="" /><?php }
				?>
				</div>

			</div>
		</section>

		<section id="contact">
			<div class="container">
				<h2><span>Contact Us</span></h2>
				<h4 class="tagline">We are an open agency committed to quality and innovation. <br>We guarantee that we’ll deliver something you love.</h4>
				<div class="fractional clearfix">
					<div class="half">
						<h3>You found us! Well, at least digitally.</h3>
						<p>Here’s how to speak with us by phone, email, <br>or in person at our Montreal office.</p>

						<p class="address">
							<span>Stresslimit Design Inc.</span>
							<span>5445 de Gaspé, Studio #105</span>
							<span>Montréal, QC &nbsp; H2T 3B2</span>
							<span>514-256-7400</span>
							<span><a href="mailto:&#105;nfo&#064;&#115;tre&#115;&#115;l&#105;m&#105;tdes&#105;gn&#046;&#099;om">&#105;nfo&#064;&#115;tre&#115;&#115;l&#105;m&#105;tdes&#105;gn&#046;&#099;om</a></span>
						</p>
					</div>
					<div class="half map">
						<div id="stressmap"></div>
						<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
						<script type="text/javascript">

							function initialize() {
								var location = {
									"name":"Montreal",
									"lng":45.527021,
									"lat":-73.595382
								};
								var myOptions = {
							    	zoom: 16,
									center: new google.maps.LatLng(location.lng, location.lat),
		    						disableDefaultUI: true,
								    mapTypeId: google.maps.MapTypeId.ROADMAP
								};

								var map = new google.maps.Map(document.getElementById("stressmap"), myOptions);

								var marker = new google.maps.Marker({
									"title" : "Stresslimit",
									"address" : "5445 Avenue de Gaspé, Montréal, QC",
									"lng" : 45.527021,
									"lat" : -73.595382,
									"zIndex": 1
								});
							}
							initialize();

						</script>
	<?php /*
	<script type="text/javascript" src="<?php echo get_bloginfo('template_url') ?>/js/map.js"></script>
	<script type="text/javascript">STRESS.googleMap.init(city);</script>
	<div id="map" style="height:274px; width:474px;"></div>
	*/ ?>
					</div>
				</div>
			</div>
		</section>

<?php get_footer();