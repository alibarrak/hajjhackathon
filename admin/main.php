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
                <a class="nav-link active" href="main">
                  <i class="fa fa-thumbs-up"></i>
                  Surveys
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="qrs">
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
            <h1 class="h2">Surveys</h1>
            <div class="btn btn-success" data-toggle="modal" data-target="#modal"><i class="fa fa-plus"></i> Add</div>
          </div>

          <table id="table" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>LOT #</th>
                    <th>Category</th>
                    <th>QTY</th>
                    <th>Expiry</th>
                    <th>Created on</th>
                    <th></th>
                </tr>
            </thead>
        </table>

        </main>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="emodalLabel">New LOT</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <form id="form">
              <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="cat_id">

                  <?php
                  	global $db, $db_name;

                    // auth
                    //auth(null);

                    $json = $db->select("{$db_name}.category", "1", null, "*");

                    $data = array();
                    foreach ($json as $j) {
                      echo "<option value='{$j['id']}'>{$j['cat_en']}</option>";
                    }
                  ?>

                </select>
              </div>

              <div class="form-group">
                <label>َQTY</label>
                <input type="text" class="form-control" value="10" name="qty">
              </div>

              <div class="form-group">
                <label>Expiry</label>
                <input type="text" class="form-control" value="2020-01-01" name="expiry">
              </div>


            </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="save">Save</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <?= getFooterScripts(); ?>

    <script src="js_main/main.js?v=<?=time();?>"></script>

  </body>
</html>
