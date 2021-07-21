<?php session_start();

require 'config.php';
require '../functions.php';

$conexion = conexion($bd_config);
$usuario = iniciarSession('users', $conexion);
$user = $usuario['name'];

$conexion1 = conexion($bd_config);
$statement3 = $conexion1->prepare('UPDATE users SET active = 0 WHERE name = :usuario LIMIT 1');
$statement3->execute(
  array(
      ':usuario' => $user
    )
);

session_destroy();

header('Location: '.RUTA.'index.php');

 ?>
