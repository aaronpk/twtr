<?php
require_once('lib.php');

if(get('url')) {
  if(preg_match('/statuse?s?\/([0-9]+)/', get('url'), $match)) {
    $id = $match[1];
    $shortURL = 'http://twtr.io/' . b10to60($id);
  } elseif(preg_match('/twtr\.io\/([0-9a-z]+)/i', get('url'), $match)) {
    $twtr = 'https://twitter.com/_/status/' . b60to10($match[1]);
    $ch = curl_init($twtr);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_exec($ch);
    $shortURL = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
  } else {
    header('HTTP/1.1 400 Bad Request');
    if(get('format') == 'html') {
      include('header.php');
      echo '<p>Input must be a full tweet URL</p>';
      include('footer.php');
    } else {
      header('Content-type: application/json');
      echo json_encode(array('error'=>'invalid_url', 'error_description'=>'Input must be a full tweet URL'));
    }
    die();
  }
} else {
  header('HTTP/1.1 400 Bad Request');
  header('Content-type: application/json');
  echo json_encode(array('error'=>'missing_input','error_description'=>'Pass in a full tweet URL into the "url" parameter'));
  die();
}

if(get('format') == 'html') {

  include('header.php');
  echo '<p>' . $shortURL . '</p>';
  include('footer.php');

} elseif(get('format') == 'text') {

  header('Content-type: text/plain');
  echo $shortURL;

} else {

  header('Content-type: application/json');
  echo json_encode(array('short_url'=>$shortURL));

}
