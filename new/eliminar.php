<?php
// eliminar.php

require_once ('conexion.php');

$conexion = new Conexion();
$db = $conexion->conectar();

$id = $_GET['id'] ?? '';

if (!empty($id)) {
    $sql = "DELETE FROM producto WHERE id = $id";

    if ($db->query($sql) === TRUE) {
        header("Location: mostrar.php");
        exit();
    } else {
        echo "Error al eliminar el producto: " . $db->error;
    }
}
?>
