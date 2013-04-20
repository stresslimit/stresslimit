<?php get_header(); ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article <?php post_class() ?> id="post-<?php the_ID() ?>">

				<h1><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>

				<?php the_content() ?>

			</article>
    
		<?php endwhile; ?>

	<?php else : ?>

		<h1>Uh oh...</h1>

	<?php endif; ?>

<?php get_footer();