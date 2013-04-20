<?php get_header(); ?>

		<section class="page-header" id="blog">
			<h2><span>Blog</span></h2>
			<h4 class="tagline">We love to share so here's some stuff of ours.</h4>

			<hr class="stripe" />

			<?php get_sidebar() ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article>

				<h1><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>
				<h6><?php the_date() ?> &nbsp; • &nbsp; by 
				<?php $i = new CoAuthorsIterator();
					while ($i->iterate()) : ?>
					<?php the_author() ?> 
					<?php echo ($i->is_last()) ? '' : ', ' ?>
				<?php endwhile; ?>
				</h6>
			
				<?php the_post_thumbnail( 'large' ) ?>

				<?php the_content(); ?>

			</article>

			<hr class="stripe" />

			<?php sld_post_nav() ?>

		<?php endwhile; endif; ?>

		</section>

<?php get_footer();
