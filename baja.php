<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Baja de Productos</title>
    <link rel="stylesheet" href="CSS/styles.css">
</head>
<body>

<div class="layout">

    <!-- Sidebar -->
    <aside class="sidebar">

        <h2>🐭 El Ratón</h2>

        <nav>
            <a href="alta.php">Alta</a>
            <a class="active" href="baja.php">Baja</a>
            <a href="modificar.php">Modificar</a>
            <a href="ventas.php">Ventas</a>
            <a href="reportes.php">Reportes</a>
            <a href="index.html" class="logout">

                Cerrar sesión

            </a>
        </nav>

    </aside>

    <!-- Contenido -->
    <main class="main">

        <section class="card">

            <h2>🗑️ Baja de Producto</h2>

            <!-- FORMULARIO -->
            <form action="" method="POST" class="form">

                <div class="group">

                    <input type="text"
                           name="codigo"
                           required>

                    <label>Código del producto</label>

                </div>

                <button type="submit"
                        name="buscar"
                        class="save">

                    🔍 Buscar

                </button>

            </form>

            <br>

            <?php

            if(isset($_POST['buscar'])){

                $codigo = $_POST['codigo'];

                $sql = "SELECT * FROM productos
                        WHERE codigo='$codigo'";

                $resultado = mysqli_query($conexion,$sql);

                $fila = mysqli_fetch_assoc($resultado);

                if($fila){

            ?>

            <!-- DATOS PRODUCTO -->
            <form action="eliminar.php" method="POST" class="form">

                <input type="hidden"
                       name="id"
                       value="<?php echo $fila['id']; ?>">

                <div class="group filled">

                    <input type="text"
                        value="<?php echo $fila['nombre']; ?>"
                        placeholder=" "
                        readonly>

                    <label>Nombre</label>

                </div>

                <div class="group filled">

                    <input type="text"
                           value="<?php echo $fila['categoria']; ?>"
                            placeholder=" "
                           readonly>

                    <label>Categoría</label>

                </div>

                <div class="group filled">

                    <input type="number"
                        value="<?php echo $fila['stock']; ?>"
                        placeholder=" "
                        readonly>

                    <label>Stock</label>

                </div>

                <!-- MOTIVO -->
                <div class="group">

                    <input type="text"
                    name="motivo"
                    placeholder=" "
                    required>

                    <label>Motivo de baja</label>

                </div>

                <button type="submit"
                        class="delete">

                    🗑️ Eliminar Producto

                </button>

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