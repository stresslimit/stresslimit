<?php
/*
Template Name: Tools - extract email addresses
*/
?>
<?php get_header(); ?>

<div class="simplecontent preview">

<h1>Stresslimit Tools: Extract E-mails</h1>

<?php

if(isset($_POST['t'])) {
	$c = $_POST['t'];
	preg_match_all('/[a-zA-Z][\w\.-]*[a-zA-Z0-9]*@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]/',$c,$matches);
	$m = $matches[0];
	$m = array_unique($m);
	$found = '';
	foreach ($m as $v) {
		// do something for every address:
		//$_ENV['db']->query("delete from signupBlog where email='$v' limit 1");
		$found .= "$v<br/>";
	}
	echo "<p>found ".count($m)." email addresses</p>".$found;
} else {
	echo '
	<form action="" method="post">
	<textarea name="t" rows="11" cols="44"></textarea>
	<br>
	<input type="submit" value="get them" />
	</form>
	';
}

?>


<br><br>
<a href="/tools">&#x2190; go back</a>

</div>

<?php get_footer();
