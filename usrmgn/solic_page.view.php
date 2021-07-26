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

        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html"><img src="../img/logo.png" height="25"></a>
                </div>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-right navbar-top-links">

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?php echo $user; ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil del usuario</a>
                            </li>

                            <li class="divider"></li>
                            <li><a href="../admin/close.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <div class="company text-center"><h6><?php echo $comp; ?></h6></div>
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>

                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="../adm/adm_page.php"><i class="fa fa-dashboard fa-fw"></i>&nbsp;&nbsp;Dashboard</a>
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-user-o fa-fw"></i>&nbsp;&nbsp;Gestión de usuarios<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a class="active" href="#">Revisar solicitudes</a>
                                    </li>
                                    <li>
                                        <a href="update_page.php">Modificación de usuarios</a>
                                    </li>
                                    
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-cogs fa-fw"></i>&nbsp;&nbsp;Área Técnica<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="flot.html">Normas de consumo</a>
                                    </li>
                                    <li>
                                        <a href="morris.html">Nuevo producto</a>
                                    </li>
                                    <li>
                                        <a href="morris.html">Actualizar producto</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-wrench fa-fw"></i>&nbsp;&nbsp;Producción<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="panels-wells.html">Nueva orden de producción</a>
                                    </li>
                                    <li>
                                        <a href="buttons.html">Actualizar órdenes</a>
                                    </li>
                                    <li>
                                        <a href="buttons.html">Cerrar órdenes</a>
                                    </li>
                                    <li>
                                        <a href="buttons.html">Informe de órdenes en proceso</a>
                                    </li>

                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-wrench fa-fw"></i>&nbsp;&nbsp;Área de ensayos<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="panels-wells.html">Ensayos a productos</a>
                                    </li>
                                    <li>
                                        <a href="buttons.html">Certificados de calidad</a>
                                    </li>
                                    <li>
                                        <a href="buttons.html">Informes</a>
                                    </li>

                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Solicitudes de nuevos usuarios:</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <br>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                          <table class="table d-block m-3">
                      			<thead>
                      				<tr>
                      					<th scope="col">Identificador</th>
                      					<th scope="col">Nombre completo</th>
                      					<th scope="col">Correo electrónico</th>
                      					<th scope="col">Editar</th>
                      					<th scope="col">Eliminar</th>
                      				</tr>
                      			</thead>
                      			<tbody>
                      				<?php
                              $conexion1 = conexion($bd_config);
                              $query = $conexion1->prepare('SELECT * FROM new_user_request');
                              $query->execute();
                              $data = $query->fetchAll();

                              foreach($data as $solicitudes){ ?>
                      				<tr>
                      					<td><?php echo $solicitudes["name"] ?></td>
                      					<td><?php echo $solicitudes["fullname"] ?></td>
                      					<td><?php echo $solicitudes["email"] ?></td>
                      					<td><a class="btn btn-warning" href="<?php echo "solic_confirm.php?name=" . $solicitudes["name"]?>"><i class="fa fa-edit"></i></a></td>
                      					<td><a class="btn btn-danger" href="<?php echo "solic_delete.php?name=" . $solicitudes["name"]?>"><i class="fa fa-trash"></i></a></td>
                      				</tr>
                      				<?php } ?>
                      			</tbody>
                      		</table>
                        </div>
                    </div>
                    <!-- /.row -->
                    <br>
                    <br>
                    <!-- /.row -->


                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
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
