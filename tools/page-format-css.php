<?php
/*
Template Name: Tools - css format
*/
?>
<?php

get_header(); ?>

<div class="simplecontent preview">

<h1>Stresslimit Tools: Format CSS</h1>

<?

if($text = @$_POST['text']) {
	
	$s = array(
		"\r"	=>	"",
		"\n"	=>	"",
		"\t"	=>	"",
		// " "	=>	"",
		";"	=>	"; ",
		"{"	=>	" { ",
		"}"	=>	"}\r\n",
	);

	echo '<p><textarea rows="13" cols="44">'.str_replace(array_keys($s),array_values($s),$text).'</textarea></p>';

} else {
	
?>

<p>paste css and it will be formatted in classic stresslimit style [no frills: each declaration on one line, etc]</p>
<form action="" method="post">
<p><textarea rows="13" cols="44" name="text"></textarea></p>
<p><input type="submit" value="clean" /></p>
</form>

<?

}

?>


<br><br>
<a href="/tools">&#x2190; go back</a>

</div>

<?php get_footer();
