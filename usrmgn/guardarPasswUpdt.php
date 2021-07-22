<?php session_start();
require '../admin/config.php';
require '../functions.php';

$conexion = conexion($bd_config);
$usuario = iniciarSession('users', $conexion);
$user = $usuario['name'];

#Salir si alguno de los datos no está presente
if (!isset($_POST["password"]))
  {
echo "Complete todos los datos";
}

else{
$name = $_POST["name"];
$password = $_POST["password"];
$password = hash('sha512', $password);

$conexion1 = conexion($bd_config);

$statement = $conexion1->prepare('UPDATE users SET password = :password, updated_by = :user WHERE name=:name');
$statement->execute(
      array(
          ':name' => $name,
          ':password' => $password,
          ':user' => $user
      )
  );


}
?>
