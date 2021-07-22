<?php session_start();
require '../admin/config.php';
require '../functions.php';

if(!isset($_GET["name"])) exit();
$name = $_GET["name"];

$conexion1 = conexion($bd_config);
$sentencia = $conexion1->prepare("DELETE FROM new_user_request WHERE name = ?;");
$resultado = $sentencia->execute([$name]);
if($resultado === TRUE){
	header("Location: solic_page.php");
	exit;
}
else echo "Algo salió mal";
?>
