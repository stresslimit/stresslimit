<? 
	wp_enqueue_script('blog','http://beta.stresslimitdesign.com/wordpress/wp-content/themes/stresslimit/js/blog.js');
	$show_banner = false;
	get_header(); 
?>

	<div id="main" class="container">
		<div>
			<h1>StressPress</h1>
			<p>This is our place to share articles, tutorials, pictures, and more.</p>
			<p>Browse by using these giant drop-downs or just <a href="/foundry/all" title="All posts on The Foundry">read everything</a>.</p>
		</div>

		<section id="filter" class="clearfix">
			<div class="third">
				<span class="featured-nav-label png_bg">Browse</span>
				<span class="select-label">By Principle</span>
				<div class="dropdown">
					<form action="/php/redirect.php">
						<select class="sparkbox-custom select-link" name="redirectURL" method="post">
							<option value="">Select a principle</option>
							<ul id="nav_categories" class="nav_categories">
								<li><option value="/foundry/principle/being_well_built_yields_longevity">Being well-built yields longevity.</option></li>
								<li><option value="/foundry/principle/accessibility_for_all">Accessibility for all.</option></li>
								<li><option value="/foundry/principle/content_is_king">Content is king.</option></li>
								<li><option value="/foundry/principle/design_should_enhance_usability">Design should enhance usability.</option></li>
								<li><option value="/foundry/principle/education_keeps_us_current">Education keeps us current.</option></li>
								<li><option value="/foundry/principle/giving_back_gives_us_joy">Giving back gives us joy.</option></li>
								<li><option value="/foundry/principle/meet_them_where_they_are">Meet them where they are.</option></li>
								<li><option value="/foundry/principle/there_is_no_i_in_team">There is no "i" in team.</option></li>
								<li><option value="/foundry/principle/a_well_crafted_site_adds_value">A well-crafted site adds value.</option></li>
								<li><option value="/foundry/principle/we_have_fun">We have fun.</option></li>
							</ul>
						</select>
						<input type="submit" value="Go" class="select-submit">
					</form>
				</div>
			</div>

			<div class="third">
				<span class="featured-nav-label png_bg">Browse</span>
				<span class="select-label">By Tech</span>
				<form action="/php/redirect.php" method="post">
					<select class="sparkbox-custom select-link" name="redirectURL">
						<option value="">Select a technology</option>
						<ul id="nav_categories" class="nav_categories">
							<li><option value="/foundry/tech/cms">CMS</option></li>
							<li><option value="/foundry/tech/css">CSS</option></li>
							<li><option value="/foundry/tech/database">Database</option></li>
							<li><option value="/foundry/tech/e-commerce">E-Commerce</option></li>
							<li><option value="/foundry/tech/html">HTML</option></li>
							<li><option value="/foundry/tech/java">Java</option></li>
							<li><option value="/foundry/tech/javascript">JavaScript</option></li>
							<li><option value="/foundry/tech/objective-c">Objective-C</option></li>
							<li><option value="/foundry/tech/php">PHP</option></li>
							<li><option value="/foundry/tech/rails">Rails</option></li>
						</ul>
					</select>
					<input type="submit" value="Go" class="select-submit">
				</form>
			</div>

			<div class="third">
				<span class="search-label">Search</span>
				<form class="search" method="post" action="/">
					<input type="search" name="keywords" id="keywords" placeholder="SEARCH" />
					<input type="submit" value="Search" id="search-submit"/>
				</form>
			</div>
		</section>


<?
	query_posts( 'post_status=draft&posts_per_page=1' );
	if (have_posts()) : while (have_posts()) : the_post(); 
?>

		<div id="nav-below" class="navigation">
			<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyten' ) . '</span> %title' ); ?></div>
			<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">Next post link</span>' ); ?></div>
		</div>


		<article <?php post_class() ?>id="post-<?php the_ID(); ?>">
		 	<?php if (function_exists('get_the_post_thumbnail')) echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?> 
			<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
			<?php the_content(); ?>
		</article>


		<?php comments_template( '', true ); ?>

<? 
	endwhile; endif; 
?>

	</div>

<?php get_footer(); ?>