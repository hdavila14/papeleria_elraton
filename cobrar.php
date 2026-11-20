<?php

include("conexion.php");

$id = $_POST['id'];

$sql = "SELECT * FROM productos
        WHERE id='$id'";

$resultado = mysqli_query($conexion,$sql);

$fila = mysqli_fetch_assoc($resultado);

/* DATOS PRODUCTO */

$producto = $fila['nombre'];
$precio = $fila['precio_venta'];
$stock = $fila['stock'];

/* VALIDAR STOCK */

if($stock > 0){

    /* DESCONTAR STOCK */

    $nuevo_stock = $stock - 1;

    $update = "UPDATE productos
               SET stock='$nuevo_stock'
               WHERE id='$id'";

    mysqli_query($conexion,$update);

    /* GUARDAR VENTA */

    $venta = "INSERT INTO ventas(

              producto,
              precio

              )

              VALUES(

              '$producto',
              '$precio'

              )";

    mysqli_query($conexion,$venta);

    echo "<script>

            alert('Venta realizada 😎');

            window.location='ventas.php';

          </script>";

}else{

    echo "<script>

            alert('No hay stock 😥');

            window.location='ventas.php';

          </script>";
}

?>