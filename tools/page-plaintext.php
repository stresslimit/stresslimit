<?php
/*
Template Name: Tools - clean for plaintext
*/
?>
<?php get_header(); ?>

<div class="simplecontent preview">

<h1>Stresslimit Tools: Clean Plaintext</h1>

<?php

if($text = @$_POST['text']) {

	echo '<p><textarea rows="13" cols="44">'.core::clean($text).'</textarea></p>';

} else {
	
?>

<p>paste text with word smart quotes, dashes etc [will lose bold and rich formatting]</p>
<form action="" method="post">
<p><textarea rows="13" cols="44" name="text"></textarea></p>
<p><input type="submit" value="clean" /></p>
</form>

<?php

}

?>


<br><br>
<a href="/tools">&#x2190; go back</a>

</div>

<?php get_footer();
