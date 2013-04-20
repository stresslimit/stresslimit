<?php
/*
Template Name: Tools - utf-8 character set
*/
?>
<?php get_header(); ?>

<div class="simplecontent preview">

<h1>Stresslimit Tools: Full UTF-8 Character Set</h1>

<br><br>
<h4>Warning: this page may take some time to load</h4>
<br><br>

<table>
<?

$font = "Arial";
if (array_key_exists('data1', $_GET))
{
  $font = $_GET['data1'];
}

for($i=33;$i<=11000;$i++)
{
	$str = str_pad($i,3,'0',STR_PAD_LEFT);
	echo '<tr><td>&#'.$str.';</td><td>&amp;#'.$str.';</td><td style="font-family:' . $font . '">&#' . $str . ' (' . $font . ')</tr>';
}
?>
</table>


<br><br>
<a href="/tools">&#x2190; go back</a>

</div>

<?php get_footer();
