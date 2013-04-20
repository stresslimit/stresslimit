<?php get_header(); ?>

		<section class="page-header" id="articles">
			<h2><span>Blog</span></h2>
			<h4 class="tagline">We love to share so here's some stuff of ours.</h4>

			<hr class="stripe" />

			<?php
				$i = 0;
				$left_half = array();
				$right_half = array();

				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$posts = new WP_Query( array( 'posts_per_page'=>8, 'paged'=>$paged ) );
				while ( $posts->have_posts() ) : $posts->the_post();
					// include('post-template.php');

					ob_start();
					?>
<?php /* */ ?>
				<article class="stripe-after">
					<?php if ( has_post_thumbnail( $post->ID, 'medium' )) : ?>
				 	<div class="thumbnail"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail( $post->ID, 'medium' ) ?></a></div>
					<?php endif; ?>
					<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
					<h6><?php the_date() ?> &bull; by <?php the_author() ?></h6>
					<?php the_excerpt('Continue Reading'); ?>
				</article>
					<?php
					$html = ob_get_contents();
					ob_end_clean();
					?>
<?php /* */ ?>
					<?php /* * / ?>
					$html = '
					<article class="stripe-after">
						<div class="thumbnail"><a href="'.get_permalink().'">'.sld_get_post_thumbnail( $post->ID, 'medium' ).'</a></div>
						<h3><a href="'.get_permalink().'">'.get_the_title().'</a></h3>
						<h6>'.get_the_date().' &bull; by '.get_the_author().'</h6>'.
						get_the_excerpt('Continue Reading').
					'</article>';
					?>
					<?php /* */ ?>

				<?php
					( $i++ % 2 ) ? $right_half[] = $html : $left_half[] = $html;
				endwhile;
/* */			?>

			<div class="fractional">
				<div class="half">
					<?php echo implode( '', $left_half ); ?>
				</div>
				<div class="half">
					<?php echo implode( '', $right_half ); ?>
				</div>
			</div>

			<?php sld_page_nav($posts); ?>

		</section>

<?php get_footer();