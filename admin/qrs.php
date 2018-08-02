<?php
  require('api/utils.php');
  require('partials/partials.inc.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <?=getHead();?>
    <link href="https://getbootstrap.com/docs/4.1/examples/dashboard/dashboard.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <style>
      body {background-color: #b0b0b0;}
      .sidebar-sticky {background-color: #343a40;}
      .sidebar .nav-link {color: #fff;}
    </style>
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Hajeej Voice</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="./">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid" style="position: fixed; top: 0px;">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky" style="font-size: 24px;">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link " href="main">
                  <i class="fa fa-thumbs-up"></i>
                  Surveys
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" href="qrs">
                  <i class="fa fa-qrcode"></i>
                  QRs
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="heatmap">
                  <i class="fa fa-map-marked"></i>
                  Heat Map
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Stickers</h1>
          </div>

          <table id="table" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th><i class="fa fa-thumbs-up"></i></th>
                    <th><i class="fa fa-thumbs-down"></i></th>
                </tr>
            </thead>
        </table>

        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <?= getFooterScripts(); ?>

    <script src="js_stickers/stickers.js?v=<?=time();?>"></script>

  </body>
</html>
