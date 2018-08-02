<?php
  require('partials/partials.inc.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <?= getHead(); ?>
    <link href="https://getbootstrap.com/docs/4.1/examples/cover/cover.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
  </head>

  <body class="text-center">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand">Hajeej Voice</h3>
          <nav class="nav nav-masthead justify-content-center">
          </nav>
        </div>
      </header>

      <main role="main" class="inner cover">
        <form class="form-signin">
          <img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
          <h1 class="h3 mb-3 font-weight-normal">Admin Login</h1>
          <label for="inputEmail" class="sr-only">Email address</label>
          <input type="email" id="inputEmail" class="form-control" placeholder="Email address" value="demo" >
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" id="inputPassword" class="form-control" placeholder="Password" value="demo">
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" id="login">Sign in</button>
          <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
        </form>
      </main>

      <footer class="mastfoot mt-auto">
        <div class="inner">
          <?= getFooter(); ?>
        </div>
      </footer>
    </div>


    <!-- Bootstrap core JavaScript -->
    <?= getFooterScripts(); ?>
    <script>
      $('#login').click(function(){
        window.location.href = "main";
      });

    </script>
  </body>
</html>
