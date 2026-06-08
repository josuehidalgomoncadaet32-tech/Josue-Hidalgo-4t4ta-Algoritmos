<?php
session_start();
include("conexion.php");

$error = "";

if (isset($_POST['ingresar'])) {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    // Usamos sentencias preparadas de forma limpia
    $stmt = mysqli_prepare($conexion, "SELECT id_usuario, password FROM usuarios WHERE correo_usuario = ?");
    mysqli_stmt_bind_param($stmt, "s", $correo);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if ($usuario = mysqli_fetch_assoc($resultado)) {
        // Validamos la contraseña usando password_verify o texto plano (para la cuenta tester)
        if ($password === $usuario['password'] || password_verify($password, $usuario['password'])) {
            $_SESSION['ID'] = $usuario['id_usuario'];
            header("Location: productos.php");
            exit;
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "El correo electrónico no se encuentra registrado.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión - Panchosky</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login-card">
        <h2>Iniciar Sesión</h2>
        <?php if (!empty($error)) { echo "<p class='error'>$error</p>"; } ?>
        
        <form method="POST" action="login.php">
            <input type="email" name="correo" placeholder="Correo Electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit" name="ingresar">Ingresar</button>
        </form>
        
        <div class="links">
            <a href="register.php">¿No tienes cuenta? Registrate aquí</a>
        </div>
    </div>
</body>
</html>