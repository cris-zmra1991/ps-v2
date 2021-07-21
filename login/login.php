<?php session_start();
require '../admin/config.php';
require '../functions.php';

$errores = '';

$conexion1 = conexion($bd_config);
$query = $conexion1->prepare('SELECT * FROM config');
$query->execute();
$data = $query->fetchAll();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $usuario = $_POST['usuario'];
  $password = $_POST['password'];
  $password = hash('sha512', $password);
  $company = $_POST['company'];

  $conexion = conexion($bd_config);
  $statement = $conexion->prepare('SELECT * FROM users WHERE name = :usuario AND password = :password LIMIT 1');
  $statement->execute(
    array(
        ':usuario' => $usuario,
        ':password' => $password
    )
  );
  $resultado = $statement->fetch();

  if ($resultado !== false) {
    $_SESSION['usuario'] = $usuario;
    $_SESSION['company'] = $company;

    $conexion1 = conexion($bd_config);
    $statement3 = $conexion1->prepare('UPDATE users SET active = 1 WHERE name = :usuario AND password = :password LIMIT 1');
    $statement3->execute(
      array(
          ':usuario' => $usuario,
          ':password' => $password
      )
    );

    header('Location: '.RUTA.'index.php');
  } else {
    $errores .= '<li class="text-danger">Tu usuario y/o contraseña son incorrectos</li>';
  }
}
require 'login.view.php';
 ?>
