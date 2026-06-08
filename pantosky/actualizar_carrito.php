<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['ID'])) {
    header("Location: login.php");
    exit;
}

$id_cliente = $_SESSION['ID'];
$id_producto = (int)$_POST['id_producto'];
$accion = $_POST['accion'];

if ($accion == "sumar") {
    mysqli_query($conexion, "UPDATE carrito SET cantidad = cantidad + 1 WHERE id_cliente = $id_cliente AND id_producto = $id_producto");
}

if ($accion == "restar") {
    mysqli_query($conexion, "UPDATE carrito SET cantidad = cantidad - 1 WHERE id_cliente = $id_cliente AND id_producto = $id_producto AND cantidad > 1");
}

if ($accion == "eliminar") {
    mysqli_query($conexion, "DELETE FROM carrito WHERE id_cliente = $id_cliente AND id_producto = $id_producto");
}

header("Location: carrito.php");
exit;
?>