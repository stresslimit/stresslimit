
<div id="sidebar" class="stripe">
	<?php
		// $cat = get_query_var('cat');	// [TODO] get category

		global $post;
		$cat = get_the_category( $post->ID );
		$related = get_posts( array( 'category' => $cat[0]->cat_ID, 'post__not_in' => array($post->ID), 'posts_per_page' => 3 ) );
		if ( !empty($related) ) : ?>

			<h3>Other posts in this category</h3>
			<ul>
			<?php
				foreach ($related as $post) : setup_postdata($post); ?>
				<li>
					<h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
					<h6><?php the_date() ?></h6>
					<?php // the_excerpt() ?>
				</li><?php
				endforeach;
			?>
			</ul>
			<?php
		endif; 
	?>
</div>
