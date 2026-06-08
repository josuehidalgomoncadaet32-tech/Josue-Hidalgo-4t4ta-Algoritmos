<?php 
include("conexion.php"); 
session_start();

// Corrección de la validación: se asume que el Admin tiene el ID de usuario número 1
if (!isset($_SESSION["ID"]) || $_SESSION["ID"] != 1) {
    header("Location: index.php");
    exit();
}           

$sql = "SELECT id_producto, nombre_producto, precio, stock FROM productos";

$res = mysqli_query($conexion, $sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración - Panchosky</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin.css"> 
</head>
<body>

<nav>
    <div class="logo">
        <h1 style="font-size: 24px; color: white; margin: 0;">PANCHOSKY - Admin</h1>
    </div>
    <div class="links">
        <a href="index.php">Ver Menú Principal</a>
        <a href="logout.php" style="color: #f87171; margin-left: 20px;">Cerrar Sesión</a>
    </div>
</nav>

<div class="container container-admin">
    <h2 class="text-danger mb-4 text-start" style="font-size: 2.5rem; color: #ffffff!important;">Gestión de Productos</h2>
        <a href="crear.php" class="btn btn-success me-2">+ Agregar Producto</a>
        <a href="ver_pedidos.php" class="btn btn-info text-dark fw-bold">📦 Ver Pedidos (View)</a>

    <div class="d-flex justify-content-between mb-3">
        
        <table class="table table-hover bg-white rounded shadow-sm align-middle">
            <thead class="table-danger">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock / Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if (mysqli_num_rows($res) > 0) {
                    while($p = mysqli_fetch_assoc($res)) { 
                ?>
                    <tr>
                        <td><strong>#<?php echo $p['id_producto']; ?></strong></td>
                        <td><?php echo htmlspecialchars($p['nombre_producto']); ?></td>
                        <td class="text-success fw-bold">$<?php echo number_format($p['precio'], 0, ',', '.'); ?></td>
                        <td><?php echo $p['stock']; ?> unidades</td>
                        <td>
                            <a class="btn btn-warning btn-sm fw-bold me-1" href="editar.php?id=<?php echo $p['id_producto']; ?>">Editar</a>
                            <a class="btn btn-danger btn-sm fw-bold" href="borrar.php?id=<?php echo $p['id_producto']; ?>" onclick="return confirm('¿Estás seguro de eliminar este producto?');">Borrar</a>
                        </td>
                    </tr>
                <?php 
                    } 
                } else {
                ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted py-3">No hay productos registrados en esta categoría.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>
</html>