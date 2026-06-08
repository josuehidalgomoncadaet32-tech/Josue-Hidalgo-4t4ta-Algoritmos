<?php
require "conexion.php";
session_start();

// Solo admin (id=1)
if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] != 1) {
    echo "Acceso denegado";
    exit;
}

// Verificar que llegaron los datos
if (!isset($_POST["id"]) || !isset($_POST["estado"])) {
    echo "Datos incompletos";
    exit;
}

$id = intval($_POST["id"]);
$estado = $_POST["estado"];

// Actualizar estado del pedido
$sql = "UPDATE pedidos SET estado='$estado' WHERE id=$id";
$conexion->query($sql);

// Redirigir de vuelta al panel admin
header("Location: admin.php");
exit;
?>
