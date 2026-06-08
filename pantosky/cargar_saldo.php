<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['ID'])) {
    header("Location: login.php");
    exit;
}

$id_usuario = $_SESSION['ID'];
$error = "";
$exito = "";

// Consultar saldo actual
$query = mysqli_query($conexion, "SELECT saldo, nombre_usuario FROM usuarios WHERE id_usuario = $id_usuario");
$user = mysqli_fetch_assoc($query);

if (isset($_POST['procesar_carga'])) {
    $monto = (float)$_POST['monto'];

    if ($monto > 0) {
        $update = mysqli_query($conexion, "UPDATE usuarios SET saldo = saldo + $monto WHERE id_usuario = $id_usuario");
        if ($update) {
            $exito = "¡Carga realizada con éxito! Monto acreditado: $" . number_format($monto, 2, ',', '.');
            // Refrescar datos
            $query = mysqli_query($conexion, "SELECT saldo, nombre_usuario FROM usuarios WHERE id_usuario = $id_usuario");
            $user = mysqli_fetch_assoc($query);
        } else {
            $error = "Error interno de servidor al registrar saldo.";
        }
    } else {
        $error = "Por favor ingresa un monto mayor a cero.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cargar Fondos - Panchosky</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="card">
        <h1>Billetera Digital</h1>
        <h2>Hola, <?= htmlspecialchars($user['nombre_usuario']) ?></h2>
        
        <div style="margin: 15px 0; color: white; font-size: 18px; font-weight: bold; background: rgba(0,0,0,0.2); padding: 10px; border-radius: 8px;">
            Saldo Actual: $<?= number_format($user['saldo'], 2, ',', '.') ?>
        </div>

        <?php if (!empty($error)) { echo "<p class='error'>$error</p>"; } ?>
        <?php if (!empty($exito)) { echo "<p style='color:#22c55e; font-weight:bold;'>$exito</p>"; } ?>

        <form method="POST" action="cargar_saldo.php">
            <label style="color:white; margin-bottom:5px; display:block; text-align:left; width:90%;">Monto a Cargar ($):</label>
            <input type="number" name="monto" min="1" step="any" placeholder="Ej: 2500" required>
            <button type="submit" name="procesar_carga">Confirmar e Ingresar Dinero</button>
        </form>

        <div class="footer-login" style="margin-top: 20px;">
            <a href="productos.php" style="color: white; text-decoration: underline;">Volver a la Tienda</a>
        </div>
    </div>
</body>
</html>