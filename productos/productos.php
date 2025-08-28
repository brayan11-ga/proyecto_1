<?php
$conexion = mysqli_connect("localhost", "root", "", "proyecto_ventas");
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Si viene de insertar
$mensaje = "";
if (isset($_GET['verificar']) && $_GET['verificar'] == "insertar") {
    $mensaje = "✅ Producto guardado con éxito.";
}

// Traer todos los productos
$sql = "SELECT * FROM producto ORDER BY id DESC"; // Ordenado por último insertado
$resultado = mysqli_query($conexion, $sql);

$sql = "SELECT * FROM producto";
$resultado = mysqli_query($conexion, $sql);

if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="../estilos/estiloindex.css">
    <link rel="stylesheet" href="estilosproductos.css">
    <link rel="icon" type="image/jpg" href="../img/favicon-32x32.png"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>

    <header>
        <div class="logo">
            <img src="../img/Logo.png" width="500px" height="150px">
        </div>

        <div class="titulo">
            <h1 class="textotitulo">PIOLIN</h1>
        </div>
        
        <div class="boton">
            <a href="../ingresar/ingresar.php" class="ingreso">INGRESAR</a>
        </div>
    </header>

<nav>
    <ul>
        <li><a href="../index.php">Inicio</a></li>
        <li><a href="productos.php">Productos</a></li>
        <li><a href="../formulario/formulario.php">Registro</a></li>
        <li><a href="../acerca/acerca.php">Acerca de</a></li>
    </ul>
</nav>

<section>
    <div class="productos">
        <div class="item">
            <img src="../img/arroz.jpg" alt="Arroz boluga">
            <div class="info-producto">
                <h2>Arroz Boluga</h2>
                <p class="precio">
                    $2800
                </p>
                <button class="btn-comprar">Comprar</button>
            </div>
        </div>
        

        <div class="item">
            <img src="../img/tomate.jpg" alt="Tomate">
            <div class="info-producto">
                <h2>Tomate</h2>
                <p class="precio">
                    Libra x $3200
                </p>
                <button class="btn-comprar">Comprar</button>
            </div>
        </div>
        

        <div class="item">
            <img src="../img/sal.jpg" alt="Sal Refisal">
            <div class="info-producto">
                <h2>Sal de mesa</h2>
                <p class="precio">
                    $2700
                </p>
                <button class="btn-comprar">Comprar</button>
            </div>
        </div>
        

        <div class="item">
            <img src="../img/leche.jpg" alt="Arroz boluga">
            <div class="info-producto">
                <h2>Leche Alqueria</h2>
                <p class="precio">
                    $5800
                </p>
                <button class="btn-comprar">Comprar</button>
            </div>
        </div>
        

        <div class="item">
            <img src="../img/aguila.jpg" alt="Arroz boluga">
            <div class="info-producto">
                <h2>Cerveza en lata Aguila</h2>
                <p class="precio">
                    $19000
                </p>
                <button class="btn-comprar">Comprar</button>
            </div>
        </div>
        

        <div class="item">
            <img src="../img/jabon.avif" alt="Arroz boluga">
            <div class="info-producto">
                <h2>Jabón Protex</h2>
                <p class="precio">
                    $8800
                </p>
                <button class="btn-comprar">Comprar</button>
            </div>
        </div>

    <?php while($fila = mysqli_fetch_assoc($resultado)): ?>
        
            <div class="item">
                <img src="../agregar productos/img/<?= $fila['imagen'] ?>" alt="<?= $fila['nombre'] ?>">
                <div class="info-producto">
                    <h2><?= $fila['nombre'] ?></h2>
                    <p class="precio"><?= number_format($fila['precio'], 0, ',', '.') ?></p>
                    <a href="producto.php?codigo=<?= $fila['codigoBarras'] ?>">
                    <button class="btn-comprar">comprar Producto</button>
                </a>
                </div>
                
            </div>
        <?php endwhile; ?>
    </div>
    </div>
    <!--
    <button class="btn-agregar">
        <a href="agregarproductos.html">Agregar Productos</a>
        </button>
    -->
</section>

<footer>
    <p>&copy; 2025 Supermercado Piolín. Todos los derechos reservados.</p>
</footer>
    
</body>
</html>