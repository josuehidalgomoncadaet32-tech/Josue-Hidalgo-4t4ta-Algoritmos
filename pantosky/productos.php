<?php
session_start();
include("conexion.php");

// Verificar si se presionó comprar
if (isset($_POST['comprar'])) {
    if (!isset($_SESSION['ID'])) {
        header("Location: login.php");
        exit;
    }

    $id_cliente = $_SESSION['ID'];
    $id_producto = (int)$_POST['id_producto'];

    // Verificamos si ya existe el producto en el carrito del cliente
    $check = mysqli_query($conexion, "SELECT * FROM carrito WHERE id_cliente = $id_cliente AND id_producto = $id_producto");
    
    if (mysqli_num_rows($check) > 0) {
        mysqli_query($conexion, "UPDATE carrito SET cantidad = cantidad + 1 WHERE id_cliente = $id_cliente AND id_producto = $id_producto");
    } else {
        mysqli_query($conexion, "INSERT INTO carrito (id_cliente, id_producto, cantidad) VALUES ($id_cliente, $id_producto, 1)");
    }
    header("Location: productos.php");
    exit;
}

//  contador de productos en el carrito
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

// Consultar los productos
$resultado = mysqli_query($conexion, "SELECT * FROM productos WHERE stock > 0");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos - Panchosky</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=shopping_cart" />
    <link rel="stylesheet" href="css/productos.css"></head>
<body>
    <nav>
        <div class="links">
            <a href="index.php" style="color:white; font-weight:bold; text-decoration:none; margin-right:15px;">Inicio</a>
            <a href="productos.php" style="color:white; font-weight:bold; text-decoration:none; margin-right:15px;">Productos</a>
            <?php if (isset($_SESSION['ID'])) { ?>
                <a href="cargar_saldo.php" style="color:white; font-weight:bold; text-decoration:none;">Cargar saldo ($<?= number_format($saldo_nav, 2, ',', '.') ?>)</a>
            <?php } ?>
        </div>
        
        <?php if (isset($_SESSION['ID'])) { ?>
            <a href="carrito.php" class="carrito-icono">
                <span class="material-symbols-outlined">shopping_cart</span>
                <span class="contador-carrito"><?= $items_carrito ?></span>
            </a>
        <?php } else { ?>
            <div class="links"><a href="login.php">Iniciar Sesión</a></div>
        <?php } ?>
    </nav>

    <h2>Nuestro Menú</h2>

    <div class="grid-productos">
        <?php while ($producto = mysqli_fetch_assoc($resultado)) { ?>
            <div class="card-producto">xml_error_string
                <img src="../images/<?php $producto["URL"]?>" alt="<?= htmlspecialchars($producto['nombre_producto']) ?>" onerror="this.src='https://placehold.co/240x200?text=No Hay Pancho tio'">
                <div class="info-producto">
                    <h3><?= htmlspecialchars($producto['nombre_producto']) ?></h3>
                    <p>Stock disponible: <?= $producto['stock'] ?> unidades</p>
                    <span class="precio">$<?= number_format($producto['precio'], 0, ',', '.') ?></span>
                    <form method="POST" action="productos.php">
                        <input type="hidden" name="id_producto" value="<?= $producto['id_producto'] ?>">
                        <button type="submit" name="comprar" class="btn-comprar">Agregar al Carrito</button>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>
</body>
</html>