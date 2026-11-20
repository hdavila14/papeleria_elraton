<?php

include("conexion.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$categoria = $_POST['categoria'];
$precio_costo = $_POST['precio_costo'];
$precio_venta = $_POST['precio_venta'];
$stock = $_POST['stock'];

$sql = "UPDATE productos SET

nombre='$nombre',
categoria='$categoria',
precio_costo='$precio_costo',
precio_venta='$precio_venta',
stock='$stock'

WHERE id='$id'";

$resultado = mysqli_query($conexion,$sql);

if($resultado){

    echo "Producto actualizado correctamente 😎";

}else{

    echo "Error al actualizar";

}

?>