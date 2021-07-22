<?php session_start();

require '../admin/config.php';
require '../functions.php';

$errores = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $fusuario = $_POST['fusuario'];
  $usuario = $_POST['usuario'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $repassword = $_POST['repassword'];


  if (empty($fusuario || $usuario || $email || $password || $repassword)) {
          $errores .= '<li class="text-danger">Por favor rellene todos los campos</li>';
  }
  else{

    if ($password == $repassword)
      {
            //aqui va insercion de datos
            $conexion = conexion($bd_config);
            $statement = $conexion->prepare('INSERT INTO new_user_request (name, fullname, email, password) VALUES(:name, :fullname, :email, :password)');
            $statement->execute(
                  array(
                      ':name' => $usuario,
                      ':fullname' => $fusuario,
                      ':email' => $email,
                      ':password' => $password
                  )
              );
            header('Location: '.RUTA.'login_mod/login.php');
          }
      else{
      $errores .= '<li class="text-danger">Las contraseñas no coinciden</li>';
      }
 }}
require 'register.view.php';

 ?>
