
<?php
require_once 'conexion.php';

try {
    $pdo->query("SELECT 1");
    echo "Conexion exitosa con MySQL de Azure";
} catch (PDOException $e) {
    http_response_code(500);
    echo "Error al ejecutar la consulta";
}
?>
