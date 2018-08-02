<?php

  /* Page Head */
  function getHead(){
    ob_start();
    include 'partials/head.html';
    $html = ob_get_clean();

    return $html;
	}

  /* top bar */
  function getTopBar(){
    $lang = getLang();
    $name = $lang['name'];
    ob_start();
    include 'partials/top-bar.html';
    $html = ob_get_clean();

    return $html;
  }

  /* side bar */
  function getSideBar(){
    ob_start();
    include 'partials/side-bar.html';
    $html = ob_get_clean();

    return $html;
  }

  /* Page Footer */
  function getFooter(){
    ob_start();
    include 'partials/footer.html';
    $html = ob_get_clean();

    return $html;
	}

  /* Footer Scripts */
  function getFooterScripts(){
    ob_start();
    include 'partials/footer_scripts.html';
    $html = ob_get_clean();

    return $html;
  }

?>
