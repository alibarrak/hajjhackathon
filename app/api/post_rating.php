<?php
  require_once("utils.php");
	global $db, $db_name;

  // auth
  //auth(null);

  $insert = array("question_id"=> $_POST['question_id'], "answer"=> $_POST['answer'], "latitude"=> $_POST['latitude'], "longitude"=> $_POST['longitude']);

  $json = $db->insert("{$db_name}.rating", $insert);

  echoJson(200);
?>
