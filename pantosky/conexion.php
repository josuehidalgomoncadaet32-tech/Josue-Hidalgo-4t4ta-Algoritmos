<?php
$conexion = mysqli_connect("localhost", "root", "", "panchosky");

if (!$conexion) {
    die("Error al conectar con la base de datos de Panchosky: " . mysqli_connect_error());
}
?>