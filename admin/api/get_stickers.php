<?php
  require_once("utils.php");
	global $db, $db_name;

  // auth
  //auth(null);

  $json = $db->select("{$db_name}.sticker s, {$db_name}.category c", "c.id=s.cat_id", null, "s.*, c.cat_en");

  $data = array();
  foreach ($json as $j) {
    $up = $db->select("{$db_name}.rating", "question_id={$j['id']} AND answer=0", null, "count(*) up");
    $down = $db->select("{$db_name}.rating", "question_id={$j['id']} AND answer=1", null, "count(*) down");
    $data[]= array("id"=>$j['id'], "cat_en"=>$j['cat_en'], "up"=>$up[0]['up'], "down"=>$down[0]['down']);
  }
  echoJson(200, array("data"=>$data));
?>
