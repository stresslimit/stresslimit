<?php
/*
Template Name: Tools - your IP
*/
?>
<?php get_header(); ?>

<div class="simplecontent tools">

<h1>Stresslimit Tools: your IP</h1>

<p>
<strong>Your IP Address:</strong> <input value="<?= $_SERVER['REMOTE_ADDR'] ?>"> <br><br>
<strong>Your User Agent:</strong> <input value="<?= $_SERVER['HTTP_USER_AGENT'] ?>" style="width:470px;">
</p>

<script>
jQuery(document).ready(function($){
	$('input').focus(function(){
		$(this).select();
	});
});
</script>

<br><br>
<a href="/tools">&#x2190; go back</a>

</div>

<?php get_footer();
