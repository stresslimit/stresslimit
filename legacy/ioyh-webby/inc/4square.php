<?php

define("BASE_URL", "http://api.foursquare.com/v1/");
define("CREDIDENTIALS", "juliensmith@gmail.com:sup3rr0cksfou");

function fourSquare($method, $args=array())
{
  /* method URL */
  $url = BASE_URL . "$method.json";

  /* construct GET extra params string for URL */
  if (count($args) > 0)
  {
    $fields = array();
    foreach($args as $k => $v)
      $fields[] = "$k=$v";
    $params = join("&", $fields);
    $url .= "?$params";
  }

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_USERPWD, CREDIDENTIALS);
  //curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
  curl_setopt($ch, CURLOPT_TIMEOUT, 2);
  $data = curl_exec($ch);
  curl_close($ch);
  return json_decode($data);
}
