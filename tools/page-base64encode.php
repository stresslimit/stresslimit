<?php
/*
Template Name: Tools - base64encode images
*/
?>
<?php get_header(); ?>

<div class="simplecontent preview">

<h1>Stresslimit Tools: base64encode Images for CSS</h1>

<?php

function base64_encode_image( $uploaded_image ) {
	$allowed = array( 'png', 'gif', 'jpg', 'jpeg' );
	if ( empty($uploaded_image["tmp_name"]) ) return 'there was a problem uploading your image';
	$img_path = $uploaded_image["tmp_name"];
	$filetype = $uploaded_image["type"];
	$ftmp = explode('/',$filetype);
	$filetype = $ftmp[1];
	if ( !in_array( $filetype, $allowed ) ) return 'invalid image type';
	$imgbinary = fread(fopen( $img_path, "r"), filesize($img_path));
	return 'data:image/' . $filetype . ';base64,' . base64_encode($imgbinary);
}

if ( !empty($_FILES['img']) ) {

	$img = $_FILES["img"]["error"] > 0 ? "Error: " . $_FILES["img"]["error"] : base64_encode_image( $_FILES["img"] );

?>
	<textarea rows="10" cols="90"><?php echo $img ?></textarea>
<?php

} else {
	
?>

<p>Upload a file to generate the base64encode string for use in CSS</p>
<form action="" method="post" enctype="multipart/form-data">
<p><input type="file" name="img" id="img" /></p>
<p><input type="submit" value="encode" /></p>
</form>

<?php

}

?>


<br><br>
<a href="/tools">&#x2190; go back</a>

</div>

<?php get_footer();