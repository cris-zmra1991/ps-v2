<?php session_start();
require '../admin/config.php';
require '../functions.php';

$conexion = conexion($bd_config);
$usuario = iniciarSession('users', $conexion);
$user = $usuario['name'];


#Salir si alguno de los datos no está presente
if (!isset($_POST["name"]) || !isset($_POST["fullname"]) || !isset($_POST["user_type"]) || !isset($_POST["status"]))
  {
echo "Complete todos los datos";
}

else{
$estado1 = $_POST["status"];
#Si todo va bien, se ejecuta esta parte del código...
if ($estado1 = 'Activo'){
  $estado = '1';
}
else{
  $estado = '0';
}

$name = $_POST["name"];
$fullname = $_POST["fullname"];
$usertype = $_POST["user_type"];

$conexion = conexion($bd_config);

$statement = $conexion->prepare('UPDATE users SET fullname = :fullname, user_type = :user_type, status = :estado, updated_by = :user WHERE name=:name');
$statement->execute(
      array(
          ':name' => $name,
          ':fullname' => $fullname,
          ':user_type' => $usertype,
          ':estado' => $estado,
          ':user' => $user
      )
  );

header('Location: update_page.php');

}
?>
