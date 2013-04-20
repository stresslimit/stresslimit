<?php

get_header(); ?>

<div class="simplecontent preview">

<h1>Stresslimit Tools</h1>

<?
$args = array(
  'child_of' => '8',
  'title_li' => '',
);
wp_list_pages($args);
?>

</div>