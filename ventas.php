<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ventas</title>
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

            <a href="modificar.php">Modificar</a>

            <a class="active" href="ventas.php">Ventas</a>

            <a href="reportes.php">Reportes</a>

            <a href="index.html" class="logout">

                Cerrar sesión

            </a>

        </nav>

    </aside>

    <!-- MAIN -->
    <main class="main">

        <section class="card ventas-card">

            <h2>🛒 Punto de Venta</h2>

            <!-- BUSCAR PRODUCTO -->
            <form action="" method="POST">

                <div class="row">

                    <div class="group">

                        <input type="text"
                               name="codigo"
                               placeholder=" "
                               required>

                        <label>Código del producto</label>

                    </div>

                    <button type="submit"
                            name="buscar"
                            class="search">

                        🔍 Buscar

                    </button>

                </div>

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

                    $total = $fila['precio_venta'];

            ?>

            <!-- TABLA -->
            <table>

                <tr>

                    <th>Producto</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Stock</th>

                </tr>

                <tr>

                    <td><?php echo $fila['nombre']; ?></td>

                    <td><?php echo $fila['categoria']; ?></td>

                    <td>$<?php echo $fila['precio_venta']; ?></td>

                    <td><?php echo $fila['stock']; ?></td>

                </tr>

            </table>

            <br>

            <!-- TOTALES -->
            <div class="totales">

                <div class="total-box">

                    <h3>Total a pagar</h3>

                    <p>
                        $<?php echo $total; ?>
                    </p>

                </div>

            </div>

            <br>

            <!-- PAGO -->
            <div class="group">

                <input type="number"
                       id="pago"
                       placeholder=" ">

                <label>Pago del cliente</label>

            </div>

            <!-- CAMBIO -->
            <div class="group">

                <input type="text"
                       id="cambio"
                       placeholder=" "
                       readonly>

                <label>Cambio a devolver</label>

            </div>

            <br>

            <!-- COBRAR -->
            <form action="cobrar.php" method="POST">

                <input type="hidden"
                       name="id"
                       value="<?php echo $fila['id']; ?>">

                <input type="hidden"
                       name="stock"
                       value="<?php echo $fila['stock']; ?>">

                <button type="submit"
                        class="cobrar">

                    💵 Cobrar

                </button>

            </form>

            <!-- SCRIPT CAMBIO -->
            <script>

            const pago = document.getElementById("pago");
            const cambio = document.getElementById("cambio");

            const total = <?php echo $total; ?>;

            pago.addEventListener("input", ()=>{

                let resultado = pago.value - total;

                cambio.value = "$ " + resultado;

            });

            </script>

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