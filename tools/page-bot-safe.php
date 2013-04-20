<?php
/*
Template Name: Tools - bot safe email addresses
*/
?>
<?php get_header(); ?>

<div class="simplecontent preview">

<h1>Stresslimit Tools: Bot-Safe mailto link</h1>

<?php

if($text = @$_POST['text']) {

  $t = explode(',',$text);
  if(isset($t[1]))
	echo '<textarea rows="13" cols="44" name="text">'.core::safeMail(trim($t[0]),trim($t[1])).'</textarea>';
	else
	echo '<textarea rows="13" cols="44" name="text">'.core::safeMail($text).'</textarea>';

} else {
	
?>

<form action="" method="post">
<p>Enter e-mail address: <br><textarea rows="13" cols="44" name="text"></textarea></p>
<input type="submit" value="make link" />
</form>

<?php

}

?>


<br><br>
<a href="/tools">&#x2190; go back</a>

</div>

<?php get_footer();
