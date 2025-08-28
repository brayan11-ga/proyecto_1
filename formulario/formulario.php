
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="../estilos/estiloindex.css">
    <link rel="stylesheet" href="formulario.css">
    <link rel="icon" type="image/jpg" href="../img/favicon-32x32.png"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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
        <li><a href="../productos/productos.php">Productos</a></li>
        <li><a href="../formulario/formulario.php">Registro</a></li>
        <li><a href="../acerca/acerca.php">Acerca de</a></li>
    </ul>
</nav>

<section class="principalregistro">

    <section class="registro">
        <img src="../img/login.png" alt="" width="150px" height="150px" class="logoregistro">

        <form action="conexion.php" method="post">
            <input type="text" placeholder="numeroIdentificacion" class="cajatexto" name="numero">
            <input type="text" placeholder="Nombres" class="cajatexto" name="nombres">
            <input type="text" placeholder="Apellidos" class="cajatexto" name="apellidos">
            <input type="tel" placeholder="telefono" class="cajatexto" name="telefono"  required pattern="\d{10}" minlength="10" maxlength="10">
            <input type="email" placeholder="email" class="cajatexto" name="correo">
            <input type="password" placeholder="contraseña" class="cajatexto" name="contraseña">
            <input type="submit" value="Registrarse" class="botonregistro" name="guardar">
            
        </form>

    </section>

</section>

<footer>
    <p>&copy; 2025 Supermercado Piolín. Todos los derechos reservados.</p>
</footer>
    
</body>
</html>