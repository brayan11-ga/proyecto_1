
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ingreso</title>
    <link rel="stylesheet" href="../ingresar/estiloingreso.css">
    <link rel="stylesheet" href="../estilos/estiloindex.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="icon" type="image/jpg" href="../img/favicon-32x32.png"/>
  </head>

  <body>

  <?php
if (isset($_POST['ingresar'])) {

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena']; 

    $conn = mysqli_connect("localhost", "root", "", "proyecto_ventas");

    if (!$conn) {
        die("Error en la conexión: " . mysqli_connect_error());
    }

    // Consulta
    $sql = "SELECT * FROM empleado WHERE email = '$correo' AND contraseña = '$contrasena'";
    $consulta = mysqli_query($conn, $sql);

    if (!$consulta) {
        // Mostrar error exacto de MySQL
        die("Error en la consulta: " . mysqli_error($conn));
    }

    $registro = mysqli_num_rows($consulta);

    if ($registro > 0) {
      
    echo "<div class='alert alert-success d-flex align-items-center' role='alert'>
      <svg xmlns='http://www.w3.org/2000/svg' class='d-none'>
  <symbol id='check-circle-fill' viewBox='0 0 16 16'>
    <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/>
      </svg>
      <div>
        Inicio de sesión exitoso
      </div>
    </div>";

    // Redirigir después de 2 segundos
    echo "<script>
            setTimeout(function(){
              window.location.href = '../home/home.php';
            }, 2000);
          </script>";
}
        exit();
    } else {
        echo "<div class='alert alert-danger'>verifique su usuario y contraseña</div>";
    }

?>


<?php 

if(isset($_GET['ingresar']))
    echo "<div class='alert alert-success d-flex align-items-center' role='alert'>
  <svg class='bi flex-shrink-0 me-2' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
  <div>
    An example success alert with an icon
  </div>
</div>";

?>

    <header>
      <div class="logo">
          <img src="../img/Logo.png" width="500px" height="150px">
      </div>

      <div class="titulo">
          <h1 class="textotitulo">PIOLIN</h1>
      </div>
      
      <div class="boton">
          <a href="../formulario/formulario.php" class="ingreso">REGISTRARME</a>
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

<section>
        <a href="../index.php" class="volver"><img src="../img/regre.png" alt="" width="50px" height="50px"></a>
  <div class="contenedor">
    <div class="formulario">
      
        <form action="ingresar.php" method="POST">
            <h1>Iniciar Sesión</h1>
            <div class="input-contenedor">
                <i class="bi bi-envelope-at-fill"></i>
                <input type="email" required name="correo">
                <label for="#">Email</label>
            </div>

            <div class="input-contenedor">
                <i class="bi bi-lock-fill"></i>
                <input type="password" required name="contrasena">
                <label for="#">Contraseña</label>
            </div>

            <div class="olvidar">
                <label for="#">
                    <input type="checkbox">Recordar.
                    <a href="#">Olvide mi Contraseña</a>
                </label>
            </div>

            <div class="ini">
            <input type="submit" value="Iniciar Sesión" class="botoningreso" name="ingresar">
          
        </div>
        </form>

        

        <div class="registrar">
            <p>No tengo cuenta. <a href="../formulario/formulario.php">Crear una</a></p>
        </div>

    </div>
  </div>
</section>
<footer>
  <p>&copy; 2025 Supermercado Piolín. Todos los derechos reservados.</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
  
</html>

