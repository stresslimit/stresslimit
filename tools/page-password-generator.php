<?php
/*
Template Name: Tools - password generator
*/
?>
<?php get_header(); ?>

<div class="simplecontent preview">

<h1>Stresslimit Tools: Password Generator</h1>

<?php

function getChar() {
	$exclude = array(
		'l',
		'L',
		'1',
		'0',
		'O',
		'o',
		);
	$n = rand(48,122);
	if ( ($n>=58 && $n<=64) || ($n>=91 && $n<=96) )
		$n = $n + 10;
	$l = chr($n);
	if ( in_array( $l, $exclude ) )
		getChar();
	return chr($n);
}

$length = !isset($_POST['n']) ? 21 : $_POST['n'];

?>
<p><input type="text" style="width:15em" value="<?php
for($i=1; $i<=$length; $i++) {
	echo getChar();
}
?>" id="pw"></p>
<script>
jQuery(document).ready(function($) { $('#pw').focus().select(); });
</script>

<form action="" method="post">
<p><input type="text" name="n" style="width:4em" value="<?php echo $length ?>" />
<input type="submit" value="set length" /></p>
</form>


<br><br>
<a href="/tools">&#x2190; go back</a>

</div>

<?php get_footer();
