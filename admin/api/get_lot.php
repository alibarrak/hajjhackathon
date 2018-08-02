<?php
  require_once("utils.php");
	global $db, $db_name;

  // auth
  //auth(null);

  $json = $db->select("{$db_name}.lot l, {$db_name}.category c", "c.id=l.cat_id", null, "l.*, c.cat_en");

  echoJson(200, array("data"=>$json));
?>
