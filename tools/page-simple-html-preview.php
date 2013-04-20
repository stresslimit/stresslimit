<?php
/*
Template Name: Tools - simple html preview
*/
?>
<?php get_header(); ?>

<div class="simplecontent preview">

<h1>Stresslimit Tools: Simple HTML preview</h1>

<?

if($text = @$_POST['text']) {

	echo $_POST['text'];

} else {
	
?>

<form action="" method="post">
<p><textarea rows="13" cols="44" name="text"></textarea></p>
<input type="submit" value="preview" />
</form>

<?

}

?>


<br><br>
<a href="/tools">&#x2190; go back</a>

</div>

<?php get_footer();
