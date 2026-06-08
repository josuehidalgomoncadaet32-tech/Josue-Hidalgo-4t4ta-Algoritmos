<?php
session_start();
include("conexion.php");

// Verificamos si hay usuario activo para mostrar el saldo dinámico en la navbar
$saldo_nav = 0.00;
if (isset($_SESSION['ID'])) {
    $id_user = $_SESSION['ID'];
    $res_user = mysqli_query($conexion, "SELECT saldo FROM usuarios WHERE id_usuario = $id_user");
    if ($reg = mysqli_fetch_assoc($res_user)) {
        $saldo_nav = $reg['saldo'];
    }
}

$items_carrito = 0;
$saldo_nav = 0.00;
if (isset($_SESSION['ID'])) {
    $id_cliente = $_SESSION['ID'];
    $res_count = mysqli_query($conexion, "SELECT SUM(cantidad) as total FROM carrito WHERE id_cliente = $id_cliente");
    $row_count = mysqli_fetch_assoc($res_count);
    $items_carrito = $row_count['total'] ?? 0;

    $res_user = mysqli_query($conexion, "SELECT saldo FROM usuarios WHERE id_usuario = $id_cliente");
    if ($reg = mysqli_fetch_assoc($res_user)) {
        $saldo_nav = $reg['saldo'];
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panchosky - Bienvenidos</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=shopping_cart" />
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <nav>
        <h1>Panchosky</h1>
        <div class="links">
            <a href="index.php">Inicio</a>
            <a href="productos.php">Productos</a>
            <?php if (isset($_SESSION['ID']) && $_SESSION['ID'] == 1) { ?>
                <a href="admin.php">Panel de Administración</a>
            <?php } ?>
            <?php if (isset($_SESSION['ID'])) { ?>
                <a href="cargar_saldo.php">Cargar saldo ($<?= number_format($saldo_nav, 2, ',', '.') ?>)</a>
                <a href="carrito.php" class="carrito-icono">
                <span class="material-symbols-outlined">shopping_cart</span>
                <span class="contador-carrito"><?= $items_carrito ?></span>
            </a>
                <a href="logout.php" class="logout">Cerrar Sesión</a>
            <?php } else { ?>
                <a href="login.php">Iniciar Sesión</a>
                <a href="register.php">Registrarse</a>
            <?php } ?>
        </div>
    </nav>

    <div class="hero">
        <h2>¡Los mejores panchos de la galaxia!</h2>
        <div class="PanchoskyLogo">
        <img src="images/Panchoskylogo.png" alt="Panchoskylogo" onerror="this.src='https://placehold.co/260x180?text=Panchosky'">
        </div>
        <h3>Ingredientes premium, la mejor atención y un sabor único que te va a volar la cabeza.</h3>
    </div>

    <div class="services">
        <h2>Nuestras Especialidades</h2>
        <div class="card-container">
            <div class="card">
                <img src="images/panchosky.png" alt="Pancho Clásico" onerror="this.src='https://placehold.co/260x180?text=Panchosky'">
                <h4>Clásicos</h4>
                <p>El sabor tradicional que nunca falla con aderezos únicos.</p>
            </div>
            <div class="card">
                <img src="  images/panchosky.png" alt="Mega Pancho" onerror="this.src='https://placehold.co/260x180?text=GIANPANCHO'">
                <h4>GIANPANCHOS</h4>
                <p>Para los que tienen un hambre realmente colosal.</p>
            </div>
        </div>
        <center><a href="productos.php" class="btn-servicio">Ir a la Tienda</a></center>
    </div>
</body>
</html>