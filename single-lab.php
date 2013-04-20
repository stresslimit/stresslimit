<?php get_header(); ?>

	<div id="main" class="container">

<?php if (have_posts()) : while (have_posts()) : the_post(); setup_postmeta_all(); ?>

		<article <?php post_class() ?>>

			<h1><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>
			<h6><?php sld_lab_type() ?></h6>

			<?php the_content() ?>
			
			<h3><a href="<?php echo $post->lab_url ?>">Check out the code!</a></h3>

		</article>

<?php endwhile; endif; ?>

	</div>

<?php get_footer();