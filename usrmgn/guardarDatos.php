<?php session_start();
require '../admin/config.php';
require '../functions.php';

#Salir si alguno de los datos no está presente
if (!isset($_POST["name"]) || !isset($_POST["fullname"]) || !isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["user_type"])) {
echo "Complete todos los datos";}

else{

#Si todo va bien, se ejecuta esta parte del código...

$name = $_POST["name"];
$fullname = $_POST["fullname"];
$email = $_POST["email"];
$password = $_POST["password"];
$password = hash('sha512', $password);
$usertype = $_POST["user_type"];

$conexion = conexion($bd_config);

$statement = $conexion->prepare('INSERT INTO users (name, fullname, email, password, user_type) VALUES(:name, :fullname, :email, :password, :user_type)');
$statement->execute(
      array(
          ':name' => $name,
          ':fullname' => $fullname,
          ':email' => $email,
          ':password' => $password,
          ':user_type' => $usertype
      )
  );

  $conexion1 = conexion($bd_config);
  $sentencia = $conexion1->prepare("DELETE FROM new_user_request WHERE name = ?;");
  $resultado = $sentencia->execute([$name]);

header('Location: solic_page.php');
}
?>
