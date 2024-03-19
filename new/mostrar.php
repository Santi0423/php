<?php
// mostrar.php

require_once ('conexion.php');

$conexion = new Conexion();
$db = $conexion->conectar();

$sql = "SELECT id, nombre, descripcion FROM producto";
$resultado = $db->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Información</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Lista de Productos</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = $resultado->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $fila['id']; ?></td>
                    <td><?php echo $fila['nombre']; ?></td>
                    <td><?php echo $fila['descripcion']; ?></td>
                    <td>
                        <a href="controller.php?id=<?php echo $fila['id']; ?>" class="btn btn-primary">Actualizar</a>
                        <a href="eliminar.php?id=<?php echo $fila['id']; ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        
       
        <h2>Agregar Nuevo Producto</h2>
        <form action="controller.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Agregar Producto</button>
        </form>
    </div>
</body>
</html>

<?php
$conexion->desconectar();
?>
