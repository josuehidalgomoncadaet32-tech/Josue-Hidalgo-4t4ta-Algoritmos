<?php
require "conexion.php";
session_start();

// Solo admin (id=1)
if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] != 1) {
    echo "Acceso denegado";
    exit;
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $conexion->query("UPDATE pedidos SET estado='Completado' WHERE id=$id");
}

header("Location: admin.php");
exit;
?>
