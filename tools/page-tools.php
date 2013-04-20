<?php
/*
Template Name: Tools - home
*/
?>
<?php get_header(); ?>

<article>

	<h1>Stresslimit Tools</h1>

	<ul>
	<?
	$args = array(
	  'child_of' => '8',
	  'title_li' => '',
	);
	wp_list_pages($args);
	?>
	</ul>

</div>

<?php get_footer();
