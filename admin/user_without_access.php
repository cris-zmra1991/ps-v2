<?php session_start();

require 'config.php';
require '../functions.php';

if (!isset($_SESSION['usuario'])) {
  header('Location: '.RUTA.'login_mod/login.php');
}
else{
  $conexion = conexion($bd_config);
  $usuario = iniciarSession('users', $conexion);
  $company = companySession('config', $conexion);

if ($usuario['user_type'] == '1') {
  $user = $usuario['fullname'];
  $comp = $company['company_name'];
  $adm = $company['admin_email'];

session_destroy();
require 'user_without_access.view.php';}}
 ?>
