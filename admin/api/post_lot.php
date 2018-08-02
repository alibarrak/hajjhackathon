<?php
  require_once("utils.php");
	global $db, $db_name;

  // auth
  //auth(null);

  $insert = array("cat_id"=> $_POST['cat_id'], "qty"=> $_POST['qty'], "expiry"=> $_POST['expiry']);

  $json = $db->insert("{$db_name}.lot", $insert);

  $last_id = $db->lastInsertId();

  for($i=0; $i<$_POST['qty']; $i++){
    $insert = array("lot_id"=> $last_id, "cat_id"=> $_POST['cat_id'], "expiry"=> $_POST['expiry']);
    $json = $db->insert("{$db_name}.sticker", $insert);
  }

  echoJson(200);
?>
