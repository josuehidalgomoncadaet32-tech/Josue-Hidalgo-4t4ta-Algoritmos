<?php
session_start();
include("conexion.php");

$error = "";
$exito = "";

if (isset($_POST['registrar'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $telefono = (int)$_POST['telefono'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    // Validar duplicados
    $stmt_check = mysqli_prepare($conexion, "SELECT id_usuario FROM usuarios WHERE correo_usuario = ?");
    mysqli_stmt_bind_param($stmt_check, "s", $correo);
    mysqli_stmt_execute($stmt_check);
    $res_check = mysqli_stmt_get_result($stmt_check);

    if (mysqli_num_rows($res_check) > 0) {
        $error = "El correo ya está en uso.";
    } else {
        // Encriptamos contraseña de forma segura
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt_ins = mysqli_prepare($conexion, "INSERT INTO usuarios (nombre_usuario, apellido_usuario, direccion_usuario, telefono_usuario, correo_usuario, password, saldo) VALUES (?, ?, ?, ?, ?, ?, 0.00)");
        mysqli_stmt_bind_param($stmt_ins, "sssiss", $nombre, $apellido, $direccion, $telefono, $correo, $password_hash);
        
        if (mysqli_stmt_execute($stmt_ins)) {
            $exito = "¡Registro completado! Ya puedes iniciar sesión.";
            header("Location: login.php");
            exit;
        } else {
            $error = "Hubo un problema al procesar la solicitud.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - Panchosky</title>
    <link rel="stylesheet" href="CSS/register.css">
</head>
<body>
    <div class="card">
        <h2>Crear Cuenta en Panchosky</h2>
        <?php if (!empty($error)) { echo "<p style='color:red; font-weight:bold;'>$error</p>"; } ?>
        <?php if (!empty($exito)) { echo "<p style='color:#22c55e; font-weight:bold;'>$exito</p>"; } ?>

        <form method="POST" action="register.php">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="apellido" placeholder="Apellido" required>
            <input type="text" name="direccion" placeholder="Dirección" required>
            <input type="number" name="telefono" placeholder="Teléfono" required>
            <input type="email" name="correo" placeholder="Correo Electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit" name="registrar">Registrarme</button>
        </form>

        <div class="footer-login" style="margin-top:15px;">
            <a href="login.php" style="color:red; text-decoration:none; font-weight:bold;">Volver al Login</a>
        </div>
    </div>
</body>
</html>