<?php
include("conexion.php");

/* =========================
   REPORTES DE VENTAS
========================= */

// VENTAS DEL DÍA
$sql_dia = "SELECT SUM(precio) AS total_dia
            FROM ventas
            WHERE DATE(fecha)=CURDATE()";

$res_dia = mysqli_query($conexion,$sql_dia);

$ventas_dia = mysqli_fetch_assoc($res_dia);


// VENTAS DE LA SEMANA
$sql_semana = "SELECT SUM(precio) AS total_semana
               FROM ventas
               WHERE YEARWEEK(fecha)=YEARWEEK(NOW())";

$res_semana = mysqli_query($conexion,$sql_semana);

$ventas_semana = mysqli_fetch_assoc($res_semana);


// VENTAS DEL MES
$sql_mes = "SELECT SUM(precio) AS total_mes
            FROM ventas
            WHERE MONTH(fecha)=MONTH(NOW())
            AND YEAR(fecha)=YEAR(NOW())";

$res_mes = mysqli_query($conexion,$sql_mes);

$ventas_mes = mysqli_fetch_assoc($res_mes);


/* =========================
   INVENTARIO
========================= */

// TOTAL PRODUCTOS
$sql_productos = "SELECT COUNT(*) AS total
                  FROM productos";

$res_productos = mysqli_query($conexion,$sql_productos);

$total_productos = mysqli_fetch_assoc($res_productos);


// STOCK BAJO
$sql_stock = "SELECT COUNT(*) AS bajos
              FROM productos
              WHERE stock <= 5";

$res_stock = mysqli_query($conexion,$sql_stock);

$stock_bajo = mysqli_fetch_assoc($res_stock);


/* =========================
   TABLA PRODUCTOS
========================= */

$sql_tabla = "SELECT * FROM productos";

$tabla = mysqli_query($conexion,$sql_tabla);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reportes</title>
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

            <a href="ventas.php">Ventas</a>

            <a class="active" href="reportes.php">Reportes</a>

            <a href="index.html" class="logout">

                Cerrar sesión

            </a>

        </nav>

    </aside>

    <!-- MAIN -->
    <main class="main">

        <section class="card report-card">

            <h2>📊 Reportes del Sistema</h2>

            <br>

            <!-- REPORTES VENTAS -->
            <div class="stats">

                <div class="stat-box">

                    <h3>💰 Ventas del Día</h3>

                    <p>
                        $<?php echo $ventas_dia['total_dia']; ?>
                    </p>

                </div>

                <div class="stat-box">

                    <h3>📅 Ventas Semanales</h3>

                    <p>
                        $<?php echo $ventas_semana['total_semana']; ?>
                    </p>

                </div>

                <div class="stat-box">

                    <h3>🗓️ Ventas del Mes</h3>

                    <p>
                        $<?php echo $ventas_mes['total_mes']; ?>
                    </p>

                </div>

            </div>

            <br>

            <!-- INVENTARIO -->
            <div class="stats">

                <div class="stat-box">

                    <h3>📦 Total Productos</h3>

                    <p>
                        <?php echo $total_productos['total']; ?>
                    </p>

                </div>

                <div class="stat-box warning">

                    <h3>⚠️ Stock Bajo</h3>

                    <p>
                        <?php echo $stock_bajo['bajos']; ?>
                    </p>

                </div>

            </div>

            <br>

            <!-- TABLA INVENTARIO -->
            <table>

                <tr>

                    <th>ID</th>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Stock</th>

                </tr>

                <?php
                while($fila = mysqli_fetch_assoc($tabla)){
                ?>

                <tr>

                    <td><?php echo $fila['id']; ?></td>

                    <td><?php echo $fila['codigo']; ?></td>

                    <td><?php echo $fila['nombre']; ?></td>

                    <td><?php echo $fila['categoria']; ?></td>

                    <td>$<?php echo $fila['precio_venta']; ?></td>

                    <td><?php echo $fila['stock']; ?></td>

                </tr>

                <?php
                }
                ?>

            </table>

            <br>

            <!-- BOTONES -->
            <div class="buttons">

                <a href="exportar_pdf.php">

                    <button class="pdf">

                        📄 Exportar PDF

                    </button>

                </a>

                <a href="exportar_excel.php">

                    <button class="excel">

                        📊 Exportar Excel

                    </button>

                </a>

            </div>

        </section>

    </main>

</div>

</body>
</html>