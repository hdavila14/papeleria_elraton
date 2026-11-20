<?php

include("conexion.php");

$id = $_POST['id'];
$motivo = $_POST['motivo'];

/* OBTENER PRODUCTO */

$sql_producto = "SELECT * FROM productos
                 WHERE id='$id'";

$resultado = mysqli_query($conexion,$sql_producto);

$fila = mysqli_fetch_assoc($resultado);

$producto = $fila['nombre'];

/* GUARDAR MOTIVO */

$sql_baja = "INSERT INTO bajas(

            producto,
            motivo

            )

            VALUES(

            '$producto',
            '$motivo'

            )";

mysqli_query($conexion,$sql_baja);

/* ELIMINAR PRODUCTO */

$sql_eliminar = "DELETE FROM productos
                 WHERE id='$id'";

$resultado_eliminar = mysqli_query($conexion,$sql_eliminar);

if($resultado_eliminar){

    echo "<script>

            alert('Producto eliminado 😎');

            window.location='baja.php';

          </script>";

}else{

    echo "Error";

}

?>