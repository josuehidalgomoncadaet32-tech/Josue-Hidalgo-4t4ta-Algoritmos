<?php
include("conexion.php");
session_start();

// Validación de seguridad para el administrador
if (!isset($_SESSION["ID"]) || $_SESSION["ID"] != 1) {
    header("Location: index.php");
    exit();
}

if (isset($_GET['id'])) {
    $id_producto = (int)$_GET['id'];

    // Sentencia preparada para eliminar de forma segura usando el nombre real de tu columna id_producto
    $stmt = mysqli_prepare($conexion, "DELETE FROM productos WHERE id_producto = ?");
    mysqli_stmt_bind_param($stmt, "i", $id_producto);
    
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

// Redirigir de inmediato al panel administrativo actualizando la lista de productos
header("Location: admin.php");
exit();
?>