<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="../estilos/estiloindex.css">
    <link rel="stylesheet" href="agregarproductos.css">
    <link rel="icon" type="image/jpg" href="../img/favicon-32x32.png"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Productos</title>
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
    <li><a href="home.php">Inicio</a></li>
    <li><a href="../gestion_productos/gestioproductos.php">Gestionar Productos</a></li>
    <li><a href="#">Gestionar Pedidos</a></li>
    <li><a href="#">Reporte</a></li>
    <li><a href="#">Configuración</a></li>
    </ul>
</nav>

<h2 class="tituloformulario">Agregar Productos</h2>

<div class="frm">
<form class="formularioProducto" action="insertar.php" method="post" enctype="multipart/form-data">

   <label for="nombre">Código de Barras:</label>
  <input type="text" id="codigobarras" name="codigobarras" required>

  <label for="nombre">Nombre del producto:</label>
  <input type="text" id="nombre" name="nombre" required>

  <label for="categoria">Categoría:</label>
  <select id="categoria" name="categoria" required>
    <option value="">Seleccione una categoría</option>
    <option value="aseo_hogar">Aseo para el hogar</option>
    <option value="aseo_personal">Aseo personal</option>
    <option value="comida">Dulces</option>
    <option value="frutas_verduras">Frutas y verduras</option>
  </select>

  <label for="precio">Precio:</label>
  <input type="number" id="precio" name="precio" step="0.01" min="0" required>

  <label for="stock">Cantidad en stock:</label>
  <input type="number" id="stock" name="stock" min="0" required>

  <label for="descripcion">Descripción:</label>
  <textarea id="descripcion" name="descripcion" rows="4"></textarea>

  <label for="imagen">Imagen del producto:</label>


<input type="file" id="imagen" name="imagen" class="input-oculto">

<label for="imagen" class="boton-subir">Seleccionar imagen<i class="bi bi-file-earmark-image"></i></label>



  <input type="submit"  value="Guardar" class="botonguardar" name="guardar"> 
</form>
</div>

<footer>
    <p>&copy; 2025 Supermercado Piolín. Todos los derechos reservados.</p>
</footer>
