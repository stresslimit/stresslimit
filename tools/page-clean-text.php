<?php
/*
Template Name: Tools - clean text
*/
?>
<?php get_header(); ?>

<div class="simplecontent preview">

<h1>Stresslimit Tools: Clean Text</h1>

<?php

if($text = @$_POST['text']) {

  $replace = array(
  '.          ' => '. ', // any number of spaces after a period
  '.         ' => '. ',
  '.        ' => '. ',
  '.       ' => '. ',
  '.      ' => '. ',
  '.     ' => '. ',
  '.    ' => '. ',
  '.   ' => '. ',
  '.  ' => '. ',
  "\r\n\r\n\r\n\r\n\r\n\r\n\r\n" => "\r\n", // eliminate extra carriage return line breaks
  "\r\n\r\n\r\n\r\n\r\n\r\n" => "\r\n",
  "\r\n\r\n\r\n\r\n\r\n" => "\r\n",
  "\r\n\r\n\r\n\r\n" => "\r\n",
  "\r\n\r\n\r\n" => "\r\n",
  "\r\n\r\n" => "\r\n",
  "\n\n\n\n\n\n\n" => "\n", // eliminate extra line breaks
  "\n\n\n\n\n\n" => "\n",
  "\n\n\n\n\n" => "\n",
  "\n\n\n\n" => "\n",
  "\n\n\n" => "\n",
  "\n\n" => "\n",
  '--' => '—',
  );
  
  foreach ($replace as $search => $replace)
  {
    $text = str_replace($search,$replace,$text);
  }
  echo '<p><textarea rows="15" cols="50">'.core::htmlToTextarea($text).'</textarea></p>';
  echo '<br/>'.$text;

} else {
	
?>

<p>paste text from word or plaintext to format to be copied into design layout</p>
<form action="" method="post">
<p><textarea rows="15" cols="50" name="text"></textarea></p>
<input type="submit" value="clean" />
</form>

<?php

}

?>

<br><br>
<a href="/tools">&#x2190; go back</a>

</div>

<?php get_footer();
