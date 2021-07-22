<?php session_start();
require '../admin/config.php';
require '../functions.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title></title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="../css/custom.css" rel="stylesheet" type="text/css">

    </head>
    <body>

            <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Crear cuenta de usuario:</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <br>
                    <!-- /.row -->
                    <div class="col-lg-12">
                        <div>
													<?php
													if(!isset($_GET["name"])) exit();
													$name = $_GET["name"];

													$conexion = conexion($bd_config);
													$sentencia = $conexion->prepare("SELECT * FROM new_user_request WHERE name = ?;");
													$sentencia->execute([$name]);
													$solicitudn = $sentencia->fetch(PDO::FETCH_ASSOC);

													if($solicitudn === FALSE){
														echo "¡No existe la solicitud!";
														exit();
														header("Location: solic_page.php");
													}
													?>

													<div class="col-xs-12">
														<form method="post" action="guardarDatos.php">

															<label for="name">Identificador del usuario:</label>
															<input value="<?php echo $solicitudn["name"] ?>" class="form-control" name="name" required type="text" id="name" placeholder="Identifficador de usuario">

															<label for="name">Nombre completo:</label>
															<input value="<?php echo $solicitudn["fullname"] ?>" class="form-control" name="fullname" required type="text" id="name" placeholder="Nombre completo del usuario">

															<label for="name">Correo electrónico:</label>
															<input value="<?php echo $solicitudn["email"] ?>" class="form-control" name="email" required type="text" id="email" placeholder="Correo electrónico">

															<?php $password = $solicitudn["password"]; ?>
															<label for="name">Contraseña (en caso de cambios notificar al usuario):</label>
															<input value="<?php echo $solicitudn["password"] ?>" class="form-control" name="password" required type="text" id="password" placeholder="Contraseña del usuario">

                              <label for="user_type">Rol del usuario (Asignado por el Administrador del sistema):</label>
                              <?php
                              $conexion2 = conexion($bd_config);
                              $query = $conexion2->prepare('SELECT * FROM roles');
                              $query->execute();
                              $data = $query->fetchAll();
                              ?>
                              <select class="form-control" name="user_type">
                                  <option value="0">Seleccione un privilegio de la lista</option>
                                  <?php
                                  foreach ($data as $valores):
                                  echo '<option value="'.$valores["id"].'">'.$valores["name"].'</option>';
                                  endforeach; ?>
                              </select>

															<br><input class="btn btn-info" type="submit" value="Guardar">
															<a class="btn btn-warning" href="../adm_panel/adm_page.php">Cancelar</a>
														</form>
													</div>

                        </div>
                    </div>
                    <!-- /.row -->
                    <br>
                    <br>
                    <!-- /.row -->



        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

    </body>
</html>
