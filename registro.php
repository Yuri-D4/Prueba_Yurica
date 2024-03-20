<?php
require 'conexion/conexion.php';
$db = new Database();
$con = $db->conectar();

$validar = 0;

$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$atraccion = $_POST['atraccion']; 
$comida = $_POST['comida'];
$fecha_ingreso = $_POST['fecha_ingreso'];

$sql = $con->prepare("SELECT * FROM usuario WHERE cedula = :cedula");
$sql->execute(array(':cedula' => $cedula));
$fila = $sql->fetch(PDO::FETCH_ASSOC);

if ($fila) {
    echo '<script>alert("Este usuario ya existe. Por favor cámbielo.");</script>';
    $validar = 0;
} else {
    $insertSQL = $con->prepare("INSERT INTO usuario (cedula, nombre, telefono, atraccion, comida, fecha_ingreso) VALUES (:cedula, :nombre, :telefono, :atraccion, :comida, :fecha_ingreso)");
    $insertSQL->execute(array(':cedula' => $cedula, ':nombre' => $nombre, ':telefono' => $telefono, ':atraccion' => $atraccion, ':comida' => $comida, ':fecha_ingreso' => $fecha_ingreso));
    $validar = 1;
}
?>
<script src="formulario.js"></script>
