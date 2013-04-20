<?php
get_header();
?>

<div class="simplecontent preview">

<h1>Stresslimit Tools: encode facebook & twitter share link</h1>

<?php

if($link = @$_POST['link']) {

	$title = $_POST['title'];
	$link = 'http://facebook.com/sharer.php?u='.urlencode($link).'&t='.urlencode($title);
	$shortlink = @file_get_contents('http://is.gd/create.php?format=simple&url='.$link);
	$tw = 'http://twitter.com/home?status='.$title.': '.$shortlink;
	echo '<p><label>share on facebook</label><br><input type="text" value="'.$link.'" onclick="this.select()" style="width:60em" /></p>';
	echo '<p><label>tweet</label><br><input type="text" value="'.$tw.'" onclick="this.select()" style="width:60em" /></p>';

} else {
	
?>

<form action="" method="post">
	<p><label>link</label><br><input type="text" name="link" /></p>
	<p><label>title</label><br><input type="text" name="title" /></p>
	<input type="submit" value="encode" />
</form>

<?php

}

?>

<br><br>
<a href="/tools">&#x2190; go back</a>

</div>