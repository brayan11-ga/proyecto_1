<?php

$codigoBarras = $_GET['codigo'];



// producto.php
$conexion = mysqli_connect("localhost", "root", "", "proyecto_ventas");
if (!$conexion) {
    http_response_code(500);
    die("Error de conexión: " . mysqli_connect_error());
}

// Validar ID
if (!isset($_GET['codigo']) || !ctype_digit($_GET['codigo'])) {
    http_response_code(400);
    die("Solicitud inválida: falta id de producto.");
}

$id = (int)$_GET['codigo'];

// Prepared statement para evitar inyección
$stmt = mysqli_prepare($conexion, "SELECT codigoBarras, nombre, categoria, precio, stock, descripcion, imagen FROM producto WHERE codigoBarras = ?");
mysqli_stmt_bind_param($stmt, "s", $codigoBarras);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$result || mysqli_num_rows($result) === 0) {
    http_response_code(404);
    die("Producto no encontrado.");
}

$producto = mysqli_fetch_assoc($result);
mysqli_free_result($result);
mysqli_stmt_close($stmt);
mysqli_close($conexion);

// Helpers de salida segura
function e($str) { return htmlspecialchars((string)$str, ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title><?= e($producto['nombre']) ?> | Piolín</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="../img/favicon-32x32.png"/>
    <link rel="stylesheet" href="../estilos/estiloindex.css">
    <link rel="stylesheet" href="estilosproductos.css">
    <link rel="stylesheet" href="estiloproducto.css">
</head>
<body>
    <!-- Puedes reutilizar tu header/nav actual -->
    <header>
        <div class="logo">
            <img src="../img/Logo.png" width="500" height="150" alt="Piolín">
        </div>
        <div class="titulo"><h1 class="textotitulo">PIOLIN</h1></div>
        <div class="boton"><a href="../ingresar/ingresar.php" class="ingreso">INGRESAR</a></div>
    </header>

    <nav>
        <ul>
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="productos.php">Productos</a></li>
            <li><a href="../formulario/formulario.php">Registro</a></li>
            <li><a href="../acerca/acerca.php">Acerca de</a></li>
        </ul>
    </nav>

    <div class="breadcrumb">
        <a href="productos.php">Productos</a> &nbsp;/&nbsp; <?= e($producto['nombre']) ?>
    </div>

    <main class="contenedor-detalle detalle-producto">
        <section class="detalle-producto__galeria">
            <img src="../agregar productos/img/<?= e($producto['imagen']) ?>" alt="<?= e($producto['nombre']) ?>">
        </section>

        <section class="detalle-producto__info">
            <h1><?= e($producto['nombre']) ?></h1>
            <div class="detalle-producto__precio">
                <?= '$' . number_format((float)$producto['precio'], 0, ',', '.') ?>
            </div>

            <div class="detalle-producto__meta">
                <?php if (!empty($producto['categoria'])): ?>
                    <span class="chip">Categoría: <?= e($producto['categoria']) ?></span>
                <?php endif; ?>
                <?php if ($producto['stock'] !== null && $producto['stock'] !== ''): ?>
                    <span class="chip">Stock: <?= (int)$producto['stock'] ?></span>
                <?php endif; ?>
                <span class="chip">ID: <?= (int)$producto['codigoBarras'] ?></span>
            </div>

            <?php if (!empty($producto['descripcion'])): ?>
                <h3>Descripción</h3>
                <p class="detalle-producto__descripcion"><?= e($producto['descripcion']) ?></p>
            <?php endif; ?>

            <div class="acciones">
                <button class="btn btn-primary" type="button">Agregar al carrito</button>
                <a class="btn btn-outline" href="productos.php">Volver a productos</a>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Supermercado Piolín. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
