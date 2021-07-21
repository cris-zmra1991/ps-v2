<?php

function conexion($bd_config){
  try {
    $conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['db_name'],$bd_config['user'],$bd_config['pass']);
    return $conexion;
  } catch (PDOException $e) {
    return false;
  }
}

function limpiarDatos($datos){
  $datos = htmlspecialchars($datos);
  $datos = trim($datos);
  $datos = filter_var($datos, FILTER_SANITIZE_STRING);

  return $datos;
}

function iniciarSession($table, $conexion){
  $statement = $conexion->prepare("SELECT * FROM $table WHERE name = :usuario");
  $statement->execute([
    ':usuario' => $_SESSION['usuario']
  ]);
  return $statement->fetch(PDO::FETCH_ASSOC);
}

function companySession($table, $conexion){
  $statement1 = $conexion->prepare("SELECT * FROM $table WHERE id_conf = :company");
  $statement1->execute([
    ':company' => $_SESSION['company']
  ]);
  return $statement1->fetch(PDO::FETCH_ASSOC);
}

function tuserSession($table, $conexion){
$usuarioss = $conexion->prepare("SELECT COUNT(*) ur FROM $table");
$usuarioss->execute();
return $usuarioss->fetch(PDO::FETCH_ASSOC);
}

function tuserbSession($table, $conexion){
$usuariosb = $conexion->prepare("SELECT COUNT(*) urb FROM $table WHERE status = :estado");
$usuariosb->execute([
  ':estado' => '1'
]);
return $usuariosb->fetch(PDO::FETCH_ASSOC);
}

function tusersSession($table, $conexion){
$usuariosr = $conexion->prepare("SELECT COUNT(*) urs FROM $table WHERE status = :estador");
$usuariosr->execute([
  ':estador' => '0'
]);
return $usuariosr->fetch(PDO::FETCH_ASSOC);
}

function tuserASession($table, $conexion){
$usuariosac = $conexion->prepare("SELECT COUNT(*) ura FROM $table WHERE active = :estado");
$usuariosac->execute([
  ':estado' => '1'
]);
return $usuariosac->fetch(PDO::FETCH_ASSOC);
}
 ?>
