<?php
include("conexion.php");
session_start();

// Validación de seguridad para el administrador
if (!isset($_SESSION["ID"]) || $_SESSION["ID"] != 1) {
    header("Location: index.php");
    exit();
}

$mensaje = "";
$producto = null;

// 1. Obtener los datos actuales del producto a editar
if (isset($_GET['id'])) {
    $id_producto = (int)$_GET['id'];
    $stmt_fetch = mysqli_prepare($conexion, "SELECT * FROM productos WHERE id_producto = ?");
    mysqli_stmt_bind_param($stmt_fetch, "i", $id_producto);
    mysqli_stmt_execute($stmt_fetch);
    $res = mysqli_stmt_get_result($stmt_fetch);
    $producto = mysqli_fetch_assoc($res);
    mysqli_stmt_close($stmt_fetch);

    if (!$producto) {
        die("El producto solicitado no existe.");
    }
} else {
    header("Location: admin.php");
    exit();
}

// 2. Procesar la actualización al enviar el formulario
if (isset($_POST['actualizar'])) {
    $nombre = $_POST['nombre_producto'];
    $precio = (int)$_POST['precio'];
    $stock = (int)$_POST['stock'];

    $stmt_update = mysqli_prepare($conexion, "UPDATE productos SET nombre_producto = ?, precio = ?, stock = ? WHERE id_producto = ?");
    mysqli_stmt_bind_param($stmt_update, "siii", $nombre, $precio, $stock, $id_producto);

    if (mysqli_stmt_execute($stmt_update)) {
        $mensaje = "<div class='alert alert-success'>✅ Producto actualizado exitosamente.</div>";
        // Recargar datos actualizados en el formulario
        $producto['nombre_producto'] = $nombre;
        $producto['precio'] = $precio;
        $producto['stock'] = $stock;
        header("location: admin.php");
        exit;
    } else {
        $mensaje = "<div class='alert alert-danger'>❌ Error al actualizar: " . mysqli_error($conexion) . "</div>";
    }
    mysqli_stmt_close($stmt_update);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto - Panchosky</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5" style="max-width: 600px;">
        <div class="card shadow-sm p-4">
            <h2 class="text-danger mb-4">Modificar Producto #<?php echo $id_producto; ?></h2>
            
            <?php echo $mensaje; ?>

            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Nombre del Producto:</label>
                    <input type="text" name="nombre_producto" class="form-control" value="<?php echo htmlspecialchars($producto['nombre_producto']); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Precio ($):</label>
                    <input type="number" name="precio" class="form-control" value="<?php echo $producto['precio']; ?>" min="0" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stock Disponible:</label>
                    <input type="number" name="stock" class="form-control" value="<?php echo $producto['stock']; ?>" min="0" required>
                </div>
                
                <div class="d-flex gap-2">
                    <button type="submit" name="actualizar" class="btn btn-warning fw-bold text-dark">Actualizar Cambios</button>
                    <a href="admin.php" class="btn btn-secondary">Volver al Panel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>