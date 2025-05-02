<form method="post">
    Nombre: <input name="nombre"><br>
    Categoría: <input name="categoria"><br>
    Stock inicial: <input name="stock" type="number"><br>
    Stock mínimo: <input name="stock_minimo" type="number"><br>
    <input type="submit" value="Guardar">
</form>

<?php
if ($_POST) {
    include("conexion.php");
    $conexion->query("INSERT INTO productos (nombre, categoria, stock, stock_minimo) VALUES (
        '{$_POST['nombre']}', '{$_POST['categoria']}', {$_POST['stock']}, {$_POST['stock_minimo']})");
    header("Location: index.php");
}
?>
