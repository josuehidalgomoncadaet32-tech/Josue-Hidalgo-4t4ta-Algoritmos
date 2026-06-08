<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['ID'])) {
    header("Location: login.php");
    exit;
}

$id_cliente = $_SESSION['ID'];
$mensaje = "";

// Procesar Pago mediante Descuento de Saldo y Guardado en Pedidos
if (isset($_POST['finalizar_compra'])) {
    // Consultamos los productos actuales del carrito del usuario
    $carrito_query = mysqli_query($conexion, "SELECT c.*, p.precio, p.stock, p.nombre_producto FROM carrito c INNER JOIN productos p ON c.id_producto = p.id_producto WHERE c.id_cliente = $id_cliente");
    
    if (mysqli_num_rows($carrito_query) == 0) {
        $mensaje = "El carrito está vacío.";
    } else {
        $total = 0;
        $todo_ok = true;
        $items = [];

        // 1. Validar que haya stock suficiente de TODOS los productos antes de cobrar
        while ($row = mysqli_fetch_assoc($carrito_query)) {
            if ($row['cantidad'] > $row['stock']) {
                $mensaje = "❌ No hay stock suficiente de: " . $row['nombre_producto'];
                $todo_ok = false;
                break;
            }
            $total += $row['cantidad'] * $row['precio'];
            $items[] = $row;
        }

        if ($todo_ok) {
            // 2. Verificar el saldo disponible del usuario
            $user_query = mysqli_query($conexion, "SELECT saldo FROM usuarios WHERE id_usuario = $id_cliente");
            $user_data = mysqli_fetch_assoc($user_query);
            $saldo_actual = $user_data['saldo'];

            if ($saldo_actual < $total) {
                $mensaje = "❌ Saldo insuficiente en tu billetera. ¡Cargá fondos para continuar!";
            } else {
                // 3. Todo correcto: Procedemos a impactar la compra en la Base de Datos
                
                // Descontar el dinero del saldo del usuario
                mysqli_query($conexion, "UPDATE usuarios SET saldo = saldo - $total WHERE id_usuario = $id_cliente");
                
                foreach ($items as $item) {
                    $id_p = $item['id_producto'];
                    $cant = $item['cantidad'];
                    
                    // A) Descontar el Stock del producto vendido
                    mysqli_query($conexion, "UPDATE productos SET stock = stock - $cant WHERE id_producto = $id_p");
                    
                    // B) NUEVO: Registrar el producto en la tabla de pedidos
                    mysqli_query($conexion, "INSERT INTO pedidos (id_usuario, id_producto, cantidad) VALUES ($id_cliente, $id_p, $cant)");
                }
                
                // 4. Limpiar por completo el carrito del usuario ya que la compra finalizó
                mysqli_query($conexion, "DELETE FROM carrito WHERE id_cliente = $id_cliente");
                
                $mensaje = "✅ ¡Compra realizada con éxito! Tus productos fueron registrados en pedidos.";
            }
        }
    }
}

// Consultar los ítems del carrito para renderizar la pantalla actual
$productos_carrito = mysqli_query($conexion, "
    SELECT c.id_producto, c.cantidad, p.nombre_producto, p.precio 
    FROM carrito c 
    INNER JOIN productos p ON c.id_producto = p.id_producto 
    WHERE c.id_cliente = $id_cliente
");

$total_acumulado = 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tu Carrito - Panchosky</title>
    <link rel="stylesheet" href="css/carrito.css">
</head>
<body>
    <nav>
        <div class="links">
            <a href="index.php">Inicio</a>
            <a href="productos.php">Productos</a>
            <a href="cargar_saldo.php">Volver a la Billetera</a>
        </div>
    </nav>

    <h2>Tu Carrito de Compras</h2>

    <?php if (!empty($mensaje)) { ?>
        <div class="mensaje"><?= $mensaje ?></div>
    <?php } ?>

    <div style="max-width:800px; margin: 0 auto;">
        <?php 
        if (mysqli_num_rows($productos_carrito) > 0) {
            while ($item = mysqli_fetch_assoc($productos_carrito)) { 
                $subtotal = $item['cantidad'] * $item['precio'];
                $total_acumulado += $subtotal;
                ?>
                <div class="producto">
                    <h3><?= htmlspecialchars($item['nombre_producto']) ?></h3>
                    <p>Precio Unitario: $<?= number_format($item['precio'], 0, ',', '.') ?></p>
                    <p>Subtotal: $<?= number_format($subtotal, 0, ',', '.') ?></p>
                    
                    <div class="cantidad-control">
                        <form method="POST" action="actualizar_carrito.php" style="display:inline;">
                            <input type="hidden" name="id_producto" value="<?= $item['id_producto'] ?>">
                            <input type="hidden" name="accion" value="restar">
                            <button type="submit">-</button>
                        </form>
                        
                        <input type="text" value="<?= $item['cantidad'] ?>" readonly>
                        
                        <form method="POST" action="actualizar_carrito.php" style="display:inline;">
                            <input type="hidden" name="id_producto" value="<?= $item['id_producto'] ?>">
                            <input type="hidden" name="accion" value="sumar">
                            <button type="submit">+</button>
                        </form>

                        <form method="POST" action="actualizar_carrito.php" style="display:inline; margin-left: 15px;">
                            <input type="hidden" name="id_producto" value="<?= $item['id_producto'] ?>">
                            <input type="hidden" name="accion" value="eliminar">
                            <button type="submit" style="background:#dc2626; color:white; border:none; width:auto; padding:5px 10px; font-size:14px; border-radius:4px;">Quitar</button>
                        </form>
                    </div>
                </div>
            <?php } ?>

            <div style="text-align:right; margin-top:20px; font-size:24px; font-weight:bold; color:white;">
                Total a Pagar: $<?= number_format($total_acumulado, 0, ',', '.') ?>
            </div>

            <form method="POST" style="text-align:right;">
                <button type="submit" name="finalizar_compra" class="finalizar">Pagar con Saldo Virtual</button>
            </form>
        <?php } else { ?>
            <p style="text-align:center; color:white; font-size:18px;">No tienes productos agregados al carrito.</p>
        <?php } ?>
    </div>
</body>
</html>