<?php session_start();

require 'admin/config.php';
require 'functions.php';

// comprobar session
if (isset($_SESSION['usuario'])) {
  // validar los datos por privilegio
  $conexion = conexion($bd_config);
  $usuario = iniciarSession('users', $conexion);

  if ($usuario['user_type'] == '3') {
    header('Location: '.RUTA.'adm/adm_page.php');
    //hay que crear uno para cada tipo de usuario -- que serian prod, tecnicos y pruebas
  } elseif ($usuario['user_type'] == '1') {
    header('Location: ../admin/user_without_access.php');
  } else {
    header('Location: '.RUTA.'login/login.php');
  }
} else {
  header('Location: '.RUTA.'login/login.php');
}

 ?>
