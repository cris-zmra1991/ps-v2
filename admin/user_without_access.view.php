<!--
=========================================================
Se utilizó parte de la plantilla Material Dashboard - v2.1.2
========================================================= -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>

  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;"><img src="../img/logo.png" height="40"></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>

        </div>
      </nav>
      <!-- End Navbar -->
      <br>
      <br>
      <br>
      <br>
      <br>
      <div class="content">
        <div class="container-fluid">
          <div class="row d-flex align-content-center justify-content-center">
            <img src="../img/error.png" width="50px">
          </div>

          <div class="row d-flex align-content-center justify-content-center">
            <h3>Su usuario carece de permisos para acceder al sistema.</h3>
          </div>

          <div class="row d-flex align-content-center justify-content-center">
            <h5>Póngase en contacto con el administrador <a href="mailto:<?php echo $adm; ?>"><?php echo $adm; ?></a></h5>
          </div>
          <br>
          <div class="row d-flex align-content-center justify-content-center">
                  <div><a class="error-item" href="../login_mod/login.php">Login</a></div>

        </div>
          </div>
      </div>
</body>

</html>
