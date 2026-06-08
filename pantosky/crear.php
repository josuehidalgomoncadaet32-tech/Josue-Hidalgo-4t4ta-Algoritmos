<?php
include("conexion.php");
session_start();

// Validación de seguridad para el administrador
if (!isset($_SESSION["ID"]) || $_SESSION["ID"] != 1) {
    header("Location: index.php");
    exit();
}

$mensaje = "";

if (isset($_POST['guardar'])) {
    $nombre = $_POST['nombre_producto'];
    $precio = (int)$_POST['precio'];
    $stock = (int)$_POST['stock'];

    // Sentencia preparada para insertar según las columnas reales de tu BD
    $stmt = mysqli_prepare($conexion, "INSERT INTO productos (nombre_producto, precio, stock, id_proveedor) VALUES (?, ?, ?, NULL)");
    mysqli_stmt_bind_param($stmt, "sii", $nombre, $precio, $stock);

    if (mysqli_stmt_execute($stmt)) {
        $mensaje = "<div class='alert alert-success'>✅ Producto creado exitosamente.</div>";
        header("Location: admin.php");
        exit;
        } else {
        $mensaje = "<div class='alert alert-danger'>❌ Error al crear el producto: " . mysqli_error($conexion) . "</div>";
    }
    mysqli_stmt_close($stmt);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto - Panchosky</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5" style="max-width: 600px;">
        <div class="card shadow-sm p-4">
            <h2 class="text-danger mb-4">Nuevo Producto</h2>
            
            <?php echo $mensaje; ?>

            <form method="POST" action="crear.php">
                <div class="mb-3">
                    <label class="form-label">Nombre del Producto:</label>
                    <input type="text" name="nombre_producto" class="form-control" placeholder="Ej: Pancho con Cheddar" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Precio ($):</label>
                    <input type="number" name="precio" class="form-control" placeholder="Ej: 2500" min="0" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stock Inicial:</label>
                    <input type="number" name="stock" class="form-control" placeholder="Ej: 50" min="0" required>
                </div>
                
                <div class="d-flex gap-2">
                    <button type="submit" name="guardar" class="btn btn-success fw-bold">Guardar Producto</button>
                    <a href="admin.php" class="btn btn-secondary">Volver al Panel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>