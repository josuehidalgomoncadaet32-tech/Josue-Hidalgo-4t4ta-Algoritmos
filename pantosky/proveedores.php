<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proveedores</title>
    <!-- Bootstrap CSS -->
    <link href="https://jsdelivr.net" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #ffffff; /* Corregido a 6 dígitos */
            margin: 0;                 /* Remueve márgenes extraños */
            padding: 0;
            color: #000000;            /* Corregido a 6 dígitos */
        }

        nav {
            background: #c41818;       /* Corregido a 6 dígitos */
            padding: 1.4%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;   
            top: 0;
            z-index: 1000;
        }
        
        nav .links a {
            color: white;
            margin-left: 20px;
            text-decoration: none;
            font-weight: bold;
        }

        nav .links a:hover {
            color: #fdb10c;
        }

        h1 {
            text-align: center;
            color: #af0202; 
            font-size: 4.5rem;
            margin-top: 30px;
            margin-bottom: 10px;
        }

        h3 {
            text-align: center;
            color: #d35400; 
            font-size: 2.5rem;
            margin-bottom: 30px;
        }

        /* Contenedor de la Grilla */
        .grid-productos {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 25px;
            max-width: 1200px;
            margin: 0 auto;
            padding-bottom: 50px;
        }

        /* Tarjeta de Producto */
        .card-producto {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(255, 0, 0, 0.43);
            transition: transform 0.3s ease;
            text-align: center;
            border: 1px solid #eee;
        }

        .card-producto:hover {
            transform: translateY(-10px);
        }

        /* Imagen Comida */
        .card-producto img {
            width: auto;
            border-radius: 15px;
            margin-top:7px;
            margin-bottom:-9px;
            height: 200px;
            object-fit: cover;
        }

        /* Contenido de la Tarjeta */
        .info-producto {
            padding: 20px;
        }

        .info-producto h3 {
            margin: 10px 0;
            color: #2c3e50;
        }

        .info-producto p {
            font-size: 0.9rem;
            color: #666;
            height: 40px; 
        }

        .precio {
            display: block;
            font-size: 2.2rem;
            font-weight: bold;
            color: #e67e22;
            margin: 15px 0;
        }

        /* Botón */
        .btn-comprar {
            background-color: #e67e22;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
        }

        .btn-comprar:hover {
            background-color: #d35400;
        }
    </style>
</head>
<body>

<nav>
    <div class="links">
        <?php if (!isset($_SESSION["ID"])) { ?>
            <a href="login.php">Iniciar Sesión</a>
            <a href="register.php">Registrarse</a>
            <a href="index.php">Pagina Principal</a>
        <?php } else { ?>
            <a href="productos.php">Productos</a>
            <a href="logout.php" style="color: #f87171;">Cerrar Sesión</a>
        <?php } ?>
    </div>
</nav>

<h1>Proveedores</h1>


<div class="grid-productos px-3">

  <!-- Tarjeta 1 -->
  <div class="card card-producto h-100">
    <div class="row g-0 align-items-center h-100">
      <div class="col-md-5 d-flex align-items-center justify-content-center p-2" style="height: 180px; overflow: hidden;">
        <img src="images/gian.png.png" class="img-fluid rounded" alt="..." style="max-height: 100%; width: auto; object-fit: contain;">
      </div>
      <div class="col-md-7">
        <div class="card-body text-start">
          <h5 class="card-title fw-bold" style="color: #2c3e50;">GIANPANCHO´S food</h5>
          <p class="card-text text-muted" style="font-size: 0.85rem; margin: 0;">Gran proveedor de la materia prima para nuestro sabroso "GIANPANCHO".</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Tarjeta 2 -->
  <div class="card card-producto h-100">
    <div class="row g-0 align-items-center h-100">
      <div class="col-md-5 d-flex align-items-center justify-content-center p-2" style="height: 180px; overflow: hidden;">
        <img src="images/gian.png.png" class="img-fluid rounded" alt="..." style="max-height: 100%; width: auto; object-fit: contain;">
      </div>
      <div class="col-md-7">
        <div class="card-body text-start">
          <h5 class="card-title fw-bold" style="color: #2c3e50;">GIANPANCHO´S food</h5>
          <p class="card-text text-muted" style="font-size: 0.85rem; margin: 0;">Gran proveedor de la materia prima para nuestro sabroso "GIANPANCHO".</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Tarjeta 3 -->
  <div class="card card-producto h-100">
    <div class="row g-0 align-items-center h-100">
      <div class="col-md-5 d-flex align-items-center justify-content-center p-2" style="height: 180px; overflow: hidden;">
        <img src="images/gian.png.png" class="img-fluid rounded" alt="..." style="max-height: 100%; width: auto; object-fit: contain;">
      </div>
      <div class="col-md-7">
        <div class="card-body text-start">
          <h5 class="card-title fw-bold" style="color: #2c3e50;">GIANPANCHO´S food</h5>
          <p class="card-text text-muted" style="font-size: 0.85rem; margin: 0;">Gran proveedor de la materia prima para nuestro sabroso "GIANPANCHO".</p>
        </div>
      </div>
    </div>
  </div>

</div>
