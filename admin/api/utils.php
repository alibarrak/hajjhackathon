<?php
  date_default_timezone_set('Asia/Riyadh');

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

	require("config.php");
	require("pdo.helper.php");

	// PDO wrapperr class
	$db = new db("mysql:host={$host};dbname={$db_name};port={$port};charset=utf8", "{$user}", "{$pwd}");
  $db->setErrorCallbackFunction("echo", "text");

  // end session
  function endSession(){
    global $session_name;
    global $session_time;

    session_name($session_name);
    session_start();

    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name($session_name),'',0,'/');
    //session_regenerate_id(true);

    header("location:../");
    exit();
  }

  // Auth
  function auth($what=null){
    include("http_codes.php");
    global $session_name;
    global $session_time;

    // start session
    session_name($session_name);
    session_set_cookie_params(60*60*6);
    if(!isset($_SESSION))
      session_start();

    // check default auth
    if(empty($_SESSION['user_id']) /*|| empty($_SESSION['role_id'])*/){
      set_error(401);
    }

    // root access
    if($_SESSION['role_id']==1)
      return true;

    // check specific role
    if($what){
      if(!is_array($what))
        $what = array($what);

      foreach($what AS $role){
        if(!isset($_SESSION['roles']) || !in_array($role, $_SESSION['roles'])){ // role not assigned
          if(!function_exists('showError'))
            return false;

          set_error(403);
        }
      }
    }

    // extend last activity
    if(empty($_SESSION['last_activity']) || $_SESSION['last_activity'] + $session_time >= time())
      $_SESSION['last_activity'] = time();

    // timeout
    if($_SESSION['last_activity'] + $session_time < time()){
      session_regenerate_id(true);
      session_unset();
      session_destroy();

      set_error(401, 'timeout');
    }

    return true;
  }

	// output result as json
	function echoJson($code, $json = null) {
    include("http_codes.php");
    if (!function_exists('http_response_code'))
    {
        function http_response_code($newcode = NULL)
        {
            static $code = 200;
            if($newcode !== NULL)
            {
                header('X-PHP-Response-Code: '.$newcode, true, $newcode);
                if(!headers_sent())
                    $code = $newcode;
            }
            return $code;
        }
    }
		http_response_code($code);
		header("Content-Type: application/json");

		if($code != 200){
			if($json == null)
				$json = array('status' => 'error',
                      'code' => $code,
                      'code_i18n' => 'codes.'.$code,
                      'message' => $http_codes[$code],
                      'details' => $http_desc[$code]);
			else
				$json = array('status' => 'error',
                      'code' => $code,
                      'code_i18n' => 'codes.'.$code,
                      'message' => $http_codes[$code],
                      'details' => $json);
    }

    exit (json_encode($json));
  }

  // response with json
  function responseJSON($html_code, $details){
    include("http_codes.php");
    if (!function_exists('http_response_code'))
    {
        function http_response_code($newcode = NULL)
        {
            static $code = 200;
            if($newcode !== NULL)
            {
                header('X-PHP-Response-Code: '.$newcode, true, $newcode);
                if(!headers_sent())
                    $code = $newcode;
            }
            return $code;
        }
    }
    http_response_code($html_code);
		header("Content-Type: application/json");
    $json = array('status' => $details['status'],
                  'title' => $details['code'].'.title',
                  'message' => $details['code'].'.message');
    // extras
    if(isset($details['extras']))
      $json['extras'] = $details['extras'];

    exit (json_encode($json));
  }

  /* set error */
  function set_error($code, $msg=null){
    include("http_codes.php");

    header("HTTP/1.0 {$code} {$http_codes[$code]}");
    $uri = $_SERVER['REQUEST_URI'];
    if(strpos($uri, '/api'))
      echo echoJson($code, array("message"=>$msg));
    else
      echo showError($code, $msg);

    exit;
  }

?>
