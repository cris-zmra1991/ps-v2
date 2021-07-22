<?php session_start();
require '../admin/config.php';
require '../functions.php';

// comprobar session

if (!isset($_SESSION['usuario'])) {
  header('Location: '.RUTA.'login_mod/login.php');
}
else{
  $conexion = conexion($bd_config);
  $usuario = iniciarSession('users', $conexion);
  $company = companySession('config', $conexion);

if ($usuario['user_type'] == '3') {
  $user = $usuario['fullname'];
  $comp = $company['company_name'];


  require 'solic_page.view.php';
}
else {
  header('Location: '.RUTA.'../index.php');
}
}
 ?>
