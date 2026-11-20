<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>
    <link rel="stylesheet" href="CSS/styles.css">
</head>
<body>

<div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <h2>🐭 El Ratón</h2>

        <nav>
            <a href="alta.php">Alta</a>
            <a href="baja.php">Baja</a>
            <a class="active" href="modificar.php">Modificar</a>
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

            <h2>✏️ Modificar Producto</h2>

            <!-- BUSCAR -->
            <form action="" method="POST">

                <div class="group">

                    <input type="text"
                           name="codigo"
                           required>

                    <label>Código del producto</label>

                </div>

                <div class="buttons">

                    <button type="submit"
                            name="buscar"
                            class="save">

                        🔍 Buscar

                    </button>

                </div>

            </form>

            <?php

            if(isset($_POST['buscar'])){

                $codigo = $_POST['codigo'];

                $sql = "SELECT * FROM productos
                        WHERE codigo='$codigo'";

                $resultado = mysqli_query($conexion,$sql);

                $fila = mysqli_fetch_assoc($resultado);

                if($fila){

            ?>

            <!-- FORMULARIO MODIFICAR -->
            <form action="actualizar.php" method="POST">

                <input type="hidden"
                       name="id"
                       value="<?php echo $fila['id']; ?>">

                <div class="form">

                    <div class="group">

                        <input type="text"
                               name="nombre"
                               value="<?php echo $fila['nombre']; ?>"
                               required>

                        <label>Nombre</label>

                    </div>

                    <div class="group">

                        <input type="text"
                               name="categoria"
                               value="<?php echo $fila['categoria']; ?>"
                               required>

                        <label>Categoría</label>

                    </div>

                    <div class="group">

                        <input type="number"
                               name="precio_costo"
                               value="<?php echo $fila['precio_costo']; ?>"
                               required>

                        <label>Precio Costo</label>

                    </div>

                    <div class="group">

                        <input type="number"
                               name="precio_venta"
                               value="<?php echo $fila['precio_venta']; ?>"
                               required>

                        <label>Precio Venta</label>

                    </div>

                    <div class="group">

                        <input type="number"
                               name="stock"
                               value="<?php echo $fila['stock']; ?>"
                               required>

                        <label>Stock</label>

                    </div>

                </div>

                <div class="buttons">

                    <button type="submit"
                            class="save">

                        💾 Actualizar

                    </button>

                </div>

            </form>

            <?php

                }else{
                    echo "<p>Producto no encontrado 😥</p>";
                }

            }

            ?>

        </section>

    </main>

</div>

</body>
</html>