<?
$img = $_POST['img'];

$img = ImageCreateFromJpeg($img);
  
// get height and with of the image.
$width = imagesx($img);
$height = imagesy($img);
  
echo '<pre style="font-size:1px;">';
for($h=0;$h<$height;$h++){
 for($w=0;$w<=$width;$w++){
  if($w == $width){
   echo '<br>';
   continue;
  }
  // get image at pixel location
  $rgb = ImageColorAt($img, $w, $h);
  // convert colour into usable format
  $r = ($rgb >> 16) & 0xFF;
  $g = ($rgb >> 8 ) & 0xFF;
  $b = $rgb & 0xFF;
  // check for white/off-white colour
  if($r > 200 && $g > 200 && $b > 200){
   echo ' ';
  }else{
   echo '<span  style="color:rgb('.$r.','.$g.','.$b.');">#</span>';
  }
 }
}
echo '</pre>';

?>