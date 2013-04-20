<?php
/*
Template Name: Tools - posts
*/
?>
<?php get_header(); ?>

<div class="simplecontent preview" id="posts">

<? if (!is_user_logged_in()) : wp_redirect('/'); exit(); endif; ?>  

  <h1>Stresslimit Posts</h1>
  <? query_posts(array('post_type' => 'post', 'posts_per_page' => -1))?>
  <? if (have_posts()) : ?>
    <ul>
    <? while (have_posts()) : the_post(); ?>
      <li><a href="<?the_permalink()?>"><? the_title(); ?> (<? the_author(); ?>)</a></li>
    <? endwhile; 
  endif; ?>

</div>

<?php get_footer();
