<?php session_start();

require '../admin/config.php';
require '../functions.php';
//require '../data_access/user-dao.php'

$errores = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password = hash('sha512', $password); }
  //validar que no existan campos vacios
  if (empty($name) || empty($fullname) || empty($email) || empty($password)) {
          $errores .= '<p class="text-danger">Por favor rellene todos los campos</p>';
  }else{
  //conectar a BD
  $conexion = conexion($bd_config);
  //verificar que no existe el usuario
  $statement = $conexion->prepare('SELECT * FROM users WHERE name = :name AND fullname = :fullname  LIMIT 1');
  $statement->execute(
    array(
        ':name' => $name,
        ':fullname' => $fullname
    ));
  $resultado = $statement->fetch();
  if ($resultado != false) {
            $errores .= '<p class="text-danger">Este usuario ya existe</p>';
        }
  }
  //si el resultado es correcto ejecuta el registro
  if ($errores == '') {
      $conexion = conexion($bd_config);
      $statement = $conexion->prepare('INSERT INTO users (name, fullname, email, password) VALUES(:name, :fullname, :email, :password)');
      $statement->execute(
            array(
                ':name' => $name,
                ':fullname' => $fullname,
                ':email' => $email,
                ':password' => $password
            )
        );
  }

require 'new-user.view.php';

 ?>
