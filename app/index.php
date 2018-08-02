<?php
  require('partials/partials.inc.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <?= getHead(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="assets/css/custom.css?v=<?=time();?>">
  </head>

  <body class="text-center" style="height: 100%; width: 100%; overflow:hidden" ontouchstart="">
    <div style="font-size: 100pt; color: #fff; margin: 0 auto;">

      <div class="row voteUp vote" style="padding: 20px 0; color: #98da7c; ">
        <div class="col-sm-12">
          <i class="fa fa-thumbs-up"></i>
        </div>
      </div>

      <div class="row voteDown vote" style="padding: 20px 0; color: #da7c7c; ">
        <div class="col-sm-12">
          <i class="fa fa-thumbs-down fa-flip-horizontal"></i>
        </div>
      </div>

   </div>


    <!-- Bootstrap core JavaScript -->
    <?= getFooterScripts(); ?>

    <script>
      var question_id = <?php echo $_GET['id']; ?>;
    </script>
    <script src="js_app/app.js?v=<?=time();?>"></script>
  </body>
</html>
