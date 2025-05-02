<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Inventario</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
        th { background-color: #f2f2f2; }
        .low-stock { background-color: #ffcccc; }
        .acciones a { margin-right: 10px; text-decoration: none; }
        .menu { margin-bottom: 20px; }
    </style>
</head>
<body>
    <h1>📦 Sistema de Inventario</h1>

    <div class="menu">
        <a href="agregar.php">➕ Agregar producto</a> |
        <a href="movimientos.php">📄 Ver movimientos</a> |
        <a href="reportes.php">📊 Reportes</a>
    </div>

    <table>
        <tr>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Stock</th>
            <th>Stock Mínimo</th>
            <th>Acciones</th>
        </tr>

        <?php
        $resultado = $conexion->query("SELECT * FROM productos");
        while($fila = $resultado->fetch_assoc()):
            $alerta = $fila['stock'] < $fila['stock_minimo'] ? 'low-stock' : '';
        ?>
        <tr class="<?= $alerta ?>">
            <td><?= htmlspecialchars($fila['nombre']) ?></td>
            <td><?= htmlspecialchars($fila['categoria']) ?></td>
            <td><?= $fila['stock'] ?></td>
            <td><?= $fila['stock_minimo'] ?></td>
            <td class="acciones">
                <a href="editar.php?id=<?= $fila['id'] ?>">✏ Editar</a>
                <a href="eliminar.php?id=<?= $fila['id'] ?>" onclick="return confirm('¿Eliminar este producto?')">🗑 Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>