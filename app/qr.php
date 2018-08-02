<?php
  require('partials/partials.inc.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <?= getHead(); ?>
    <style>
      body {
        background-color: #231f20;
        background-image: url("assets/images/bg.png");
        background-repeat: repeat;
        background-size: contain;
      }
    </style>
  </head>

  <body class="text-center" style="height: 100%; width: 100%;">
    <div style="font-size: 100pt; color: #fff; margin: 0 auto;">
      <div class="row" style="padding: 20px 0; color: #fff">
        <div class="col-sm-12">
          <i class="fa fa-qrcode"></i>
        </div>
      </div>
   </div>


    <!-- Bootstrap core JavaScript -->
    <?= getFooterScripts(); ?>
  </body>
</html>
