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

  

  //CARGA DE DATOS QUE SE INSERTARAN EN TARJETAS DEL DASHBOARD
  //TOTAL DE USUARIOS DEL SISTEMA
  $tuser = tuserSession('users',$conexion);
  $ur = $tuser['ur'];
  $tuserb = tuserbSession('users',$conexion);
  $urb = $tuserb['urb'];
  $tusers = tusersSession('new_user_request',$conexion);
  $urs = $tusers['urs'];
  $tusera = tuserASession('users',$conexion);
  $ura = $tusera['ura'];

  require 'adm_page.view.php';
}
else {
  header('Location: '.RUTA.'../index.php');
}
}
 ?>
