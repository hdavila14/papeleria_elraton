<?php

include("conexion.php");

$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$categoria = $_POST['categoria'];
$precio_costo = $_POST['precio_costo'];
$precio_venta = $_POST['precio_venta'];
$stock = $_POST['stock'];

$sql = "INSERT INTO productos
(codigo,nombre,categoria,precio_costo,precio_venta,stock)

VALUES
('$codigo','$nombre','$categoria',
'$precio_costo','$precio_venta','$stock')";

mysqli_query($conexion,$sql);

header("Location: alta.html");

?>