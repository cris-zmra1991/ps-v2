<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Startmin - Bootstrap Admin Theme</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                          <div class="d-flex align-items-center">
                          <div><img src="../img/logo.png" alt="" height="35px" class="d-inline-block align-text-top"></div>
                          <div><h3 class="panel-title">&nbsp;&nbsp;Acceso al sistema</h3></div>
                        </div>
                        </div>
                        <div class="panel-body">
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                <fieldset>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text">&nbsp;<i class="fa fa-user fa-2x"></i>&nbsp;</span>
                                    <input class="form-control" type="text" name="usuario" id="basic-url" placeholder="Nombre de usuario" >
                                </div>
                                <div class="input-group mb-3">
                                  <span class="input-group-text"><i class="fa fa-key fa-2x"></i></span>
                                  <input class="form-control" type="password" name="password" placeholder="Contraseña" >
                              </div>
                              <div class="input-group mb-3">
                                  <span class="input-group-text"><i class="fa fa-industry fa-2x"></i></span>
                                  <select class="form-control" name="company">
                                      <?php
                                      foreach ($data as $valores):
                                      echo '<option value="'.$valores["id_conf"].'">'.$valores["company_name"].'</option>';
                                      endforeach; ?>
                                  </select>
                              </div>
                                <div class="text-center"> Para solicitar una nueva cuenta <a href="register.php">Clic aquí</a></div>
                                <br>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                                    <br>
                                    <!-- BEGIN error box -->
                                        <?php echo $errores; ?>
                                      <!-- END error box -->
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
