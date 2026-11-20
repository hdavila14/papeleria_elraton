<?php

include("conexion.php");

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reporte_productos.xls");

?>

<table border="1">

<tr>
    <th>ID</th>
    <th>Código</th>
    <th>Nombre</th>
    <th>Categoría</th>
    <th>Precio</th>
    <th>Stock</th>
</tr>

<?php

$sql = "SELECT * FROM productos";
$resultado = mysqli_query($conexion,$sql);

while($fila = mysqli_fetch_assoc($resultado)){

?>

<tr>

    <td><?php echo $fila['id']; ?></td>

    <td><?php echo $fila['codigo']; ?></td>

    <td><?php echo $fila['nombre']; ?></td>

    <td><?php echo $fila['categoria']; ?></td>

    <td><?php echo $fila['precio_venta']; ?></td>

    <td><?php echo $fila['stock']; ?></td>

</tr>

<?php
}
?>

</table>