<?php
include("conexion.php");

if(isset($_POST['guardar'])){

    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $precio_costo = $_POST['precio_costo'];
    $precio_venta = $_POST['precio_venta'];
    $stock = $_POST['stock'];

    /* VALIDAR PRODUCTOS REPETIDOS */

    $verificar = "SELECT * FROM productos
                  WHERE codigo='$codigo'
                  OR nombre='$nombre'";

    $resultado_verificar = mysqli_query($conexion,$verificar);

    if(mysqli_num_rows($resultado_verificar) > 0){

        echo "<script>

                alert('El producto ya existe 😥');

              </script>";

    }else{

        /* INSERTAR PRODUCTO */

        $sql = "INSERT INTO productos(

                codigo,
                nombre,
                categoria,
                precio_costo,
                precio_venta,
                stock

                )

                VALUES(

                '$codigo',
                '$nombre',
                '$categoria',
                '$precio_costo',
                '$precio_venta',
                '$stock'

                )";

        $resultado = mysqli_query($conexion,$sql);

        if($resultado){

            echo "<script>

                    alert('Producto guardado 😎');

                    window.location='alta.php';

                  </script>";

        }else{

            echo "<script>

                    alert('Error al guardar');

                  </script>";
        }

    }

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Productos</title>
    <link rel="stylesheet" href="CSS/styles.css">
</head>
<body>

<div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <h2>🐭 El Ratón</h2>

        <nav>

            <a class="active" href="alta.php">Alta</a>

            <a href="baja.php">Baja</a>

            <a href="modificar.php">Modificar</a>

            <a href="ventas.php">Ventas</a>

            <a href="reportes.php">Reportes</a>

            <a href="index.html" class="logout">

                Cerrar sesión

            </a>

        </nav>

    </aside>

    <!-- MAIN -->
    <main class="main">

        <section class="card">

            <h2>📦 Alta de Productos</h2>

            <!-- FORMULARIO -->
            <form action=""
                  method="POST"
                  class="form">

                <!-- CODIGO -->
                <div class="group">

                    <input type="text"
                           name="codigo"
                           placeholder=" "
                           required>

                    <label>Código</label>

                </div>

                <!-- NOMBRE -->
                <div class="group">

                    <input type="text"
                           name="nombre"
                           placeholder=" "
                           required>

                    <label>Nombre</label>

                </div>

                <!-- CATEGORIA -->
                <div class="group">

                    <input type="text"
                           name="categoria"
                           placeholder=" "
                           required>

                    <label>Categoría</label>

                </div>

                <!-- PRECIO COSTO -->
                <div class="group">

                    <input type="number"
                           step="0.01"
                           name="precio_costo"
                           placeholder=" "
                           required>

                    <label>Precio costo</label>

                </div>

                <!-- PRECIO VENTA -->
                <div class="group">

                    <input type="number"
                           step="0.01"
                           name="precio_venta"
                           placeholder=" "
                           required>

                    <label>Precio venta</label>

                </div>

                <!-- STOCK -->
                <div class="group">

                    <input type="number"
                           name="stock"
                           placeholder=" "
                           required>

                    <label>Stock</label>

                </div>

                <!-- BOTONES -->
                <div class="buttons">

                    <button type="submit"
                            name="guardar"
                            class="save">

                        💾 Guardar

                    </button>

                    <button type="reset"
                            class="clear">

                        🧹 Limpiar

                    </button>

                </div>

            </form>

        </section>

    </main>

</div>

</body>
</html>