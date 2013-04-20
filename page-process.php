<?php get_header(); ?>

	<section class="page-header">
		<h2><span>Our Process</span></h2>
		<h4 class="tagline">We have an elegant and efficient working methodology. Call us and see for yourself!</h4>

		<hr class="stripe">

    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article>
			<?php the_content() ?>
		</article>
		<?php endwhile; endif; ?>

		<hr class="" />

		<div class="fractional clearfix">
			<div class="half stripe">
				<img src="<?php bloginfo('template_url') ?>/images/content/robot.png" alt="" />
			</div>
			<div class="half">
				<h4>Work with us!</h4>
				<p>We love awesome, bold messaging in a slick and impressive design, especially if it adapts 
					smartly and looks great on screens from massive to mini [ie. mobile]. That’s exactly why we 
					love the site recently launched by Montréal creative marketing agency N/A Creative, a 
					collaboration between Stresslimit [UX/architecture/tech], Triboro Design [visual design], 
					and of course N/A themselves [...]</p>
			</div>
		</div>

	</section>

<?php get_footer();