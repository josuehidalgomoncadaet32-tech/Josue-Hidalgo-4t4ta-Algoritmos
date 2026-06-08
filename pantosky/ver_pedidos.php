<?php 
include("conexion.php"); 
session_start();

// Validación de seguridad para que solo el admin entre
if (!isset($_SESSION["ID"]) || $_SESSION["ID"] != 1) {
    header("Location: index.php");
    exit();
}

// Consultamos directamente a la VIEW de la base de datos
$sql = "SELECT * FROM vista_pedidos_usuarios ORDER BY fecha DESC";
$res = mysqli_query($conexion, $sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial de Pedidos - Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 style="font-family: 'Times New Roman', Times, serif;">Historial de Pedidos Realizados</h1>
            <a href="admin.php" class="btn btn-secondary">Volver al Panel</a>
        </div>

        <table class="table table-hover bg-white rounded shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>ID Pedido</th>
                    <th>Fecha</th>
                    <th>Usuario / Cliente</th>
                    <th>Correo</th>
                    <th>Producto</th>
                    <th>Cant.</th>
                    <th>Precio Unit.</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(mysqli_num_rows($res) > 0) {
                    while($row = mysqli_fetch_assoc($res)) { 
                ?>
                    <tr>
                        <td>#<?php echo $row['id_pedido']; ?></td>
                        <td><?php echo $row['fecha']; ?></td>
                        <td><strong><?php echo htmlspecialchars($row['nombre_usuario']); ?></strong></td>
                        <td><?php echo htmlspecialchars($row['correo_usuario']); ?></td>
                        <td><?php echo htmlspecialchars($row['nombre_producto']); ?></td>
                        <td><?php echo $row['cantidad']; ?></td>
                        <td>$<?php echo number_format($row['Precio'], 2); ?></td>
                        <td class="text-success fw-bold">$<?php echo number_format($row['total_pagado'], 2); ?></td>
                    </tr>
                <?php 
                    } 
                } else {
                    echo "<tr><td colspan='8' class='text-center text-muted'>No se han realizado pedidos aún.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>