<?php
// CONTROLLER.php

require_once ('conexion.php');

$conexion = new Conexion();
$db = $conexion->conectar();

$id = $_GET['id'] ?? '';
$sql = "SELECT nombre, descripcion FROM producto";
$resultado = $db->query($sql);
$producto = $resultado->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    if ($id != '') {
        $sql = "UPDATE producto SET nombre = '$nombre', descripcion = '$descripcion' WHERE id = $id";
    } else {
        $sql = "INSERT INTO producto (nombre, descripcion) VALUES ('$nombre', '$descripcion')";
    }

    if ($db->query($sql) === TRUE) {
        header("Location: mostrar.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}
?>