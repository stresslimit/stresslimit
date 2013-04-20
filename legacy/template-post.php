
			<article <?php post_class() ?>id="post-<?php the_ID(); ?>">
			 	<?php if (function_exists('get_the_post_thumbnail')) echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?> 
				<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<h6><?php the_time('l, F jS, Y') ?></h6>
				<?php the_excerpt(); ?>
				<?php 
				$post_categories = wp_get_post_categories( $post->ID ); 
				foreach($post_categories as $c){
					$cat = get_category( $c );
					// $cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug );
					echo "<a href=''>$cat->name</a>, ";
				}
				?>
				<br />
				<a href="<?php the_permalink();?>">Read more</a>
			</article>
