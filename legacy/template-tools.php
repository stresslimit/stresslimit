<?php
/*
 * Template Name: Tools Page
 */

get_header(); ?>

	<section class="content tools">

	  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	    <h1>Stresslimit Tools: <?php the_title(); ?></h1>

	    <?php the_content(); ?>
    
	    <br><br>
	    <a href="/tools">&#x2190; go back</a>

	  <?php endwhile; endif; ?>

	</section>

<?php get_footer();
