<?php 
header("HTTP/1.1 200 OK");
if ((isset($_POST['email'])) && (strlen(trim($_POST['email'])) > 0)) 
	$email = trim(stripslashes(strip_tags($_POST['email'])));
else
  $email = '';
// download from http://apidocs.mailchimp.com/api/downloads/
require_once 'MCAPI.class.php';
$apikey = '1df8b99539b0d6a39d205842225753dd-us16';
$listId = 'a027be8bc5';
$apiUrl = 'http://api.mailchimp.com/3.0/';
// create a new api object
$api = new MCAPI($apikey);
// set $merge_vars to null if you have only one input
$merge_vars = null;
if($email !== '') {
  $return_value = $api->listSubscribe( $listId, $email, $merge_vars );
  // check for error code
  if ($api->errorCode){
    echo "<p>Error: $api->errorCode, $api->errorMessage</p>";
  } else {
      echo '<p>Please check your inbox.</p>';
  }
}
?>