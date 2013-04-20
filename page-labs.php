<?php get_header(); ?>

	<section class="page-header">
		<h2><span>Labs</span></h2>
		<h4 class="tagline">We Love to Share — We are Proud of Our Code and Believe in Open Source. <br>Here are some Tools We Use.</h4>
		<?php /*<div class="half stripe-after">&nbsp;<p>We've been doing this web stuff for so long, of course we’ve developed tons of tools for every situation. We have learned so much from all the pioneers, visionaries, garage-tinkerers and open source enthusiasts over the years, that we are happy to share back. Here you will find a bunch of code pieces of various sizes and complexity that we are developing or using frequently these days. Please feel free to take, modify and use whatever you find here, or just browse and see how we do it.</p></div>*/ ?>

		<hr class="stripe">

		<div class="fractional clearfix">

<?php

require_once( TEMPLATEPATH. '/inc/groupby_taxonomy_terms.php' );
$args = array(
	'post_type' => 'lab',
	'taxonomy' => 'lab-type',
	'tax_order' => 'DESC',
	'posts_per_page' => -1,
	);

$p = sld_groupby_category( $args );

$first = true;

foreach ( $p as $post ) : setup_postdata(); setup_postmeta_all(); $i++;

	if ( sld_groupby_category_changed( $post ) ) :
		if ( !$first ) { ?>
			</div>
		<?php } ?>

			<div class="lab-category half">
				<h1><?php echo sld_groupby_category_name( $post ); ?></h1>
		<?php
		$first = false;
	endif; ?>

				<article class="lab stripe-after">
					<h3><a href="<?php /*// the_permalink() */ echo $post->lab_url ?>"><?php the_title() ?></a></h3>
					<?php echo wpautop( $post->post_content ); //the_content() ?>
					<p class="checkout-the-code"><a class="button" href="<?php echo $post->lab_url ?>">Check Out the Code</a></p>
				</article>
<?php

endforeach;

?>

			</div>
		</div>

	</section>


<?php get_footer();