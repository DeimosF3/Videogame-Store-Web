<?php
include_once("./conectar.php");
$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$bbdd = "productos";
$conexion = new Conectar($servidor, $usuario, $contraseña, $bbdd);

$productos = $conexion->recibir_datos("SELECT * FROM productos");
$id = $_GET["id"] - 1;
?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hylian Games</title>
  <link rel="stylesheet" href="./style.css" />
  <link rel="icon" href="./icon/avqakfe0a.webp" />
  <script src="functions.js"></script>
</head>

<body>
  <?php
  $titulo = $productos[$id]["titulo"];
  $precio = $productos[$id]["precio"];
  $imagen = $productos[$id]["imagen"];
  $descripcion = $productos[$id]["descripcion"];
    echo '<div class="grid todo">
    <header class="grid grid-40">
      <a href="./index.php"><h1>hylian games</h1></a>
      <button>Videojuegos</button>
      <button>Accesorios</button>
      <button>Promociones</button>
      <div class="carrito">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="48"
          height="48"
          viewBox="0 0 24 24">
          <path
            fill="currentColor"
            d="M19 20c0 1.11-.89 2-2 2a2 2 0 0 1-2-2c0-1.11.89-2 2-2a2 2 0 0 1 2 2M7 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2c1.11 0 2-.89 2-2s-.89-2-2-2m.2-3.37l-.03.12c0 .14.11.25.25.25H19v2H7a2 2 0 0 1-2-2c0-.35.09-.68.24-.96l1.36-2.45L3 4H1V2h3.27l.94 2H20c.55 0 1 .45 1 1c0 .17-.05.34-.12.5l-3.58 6.47c-.34.61-1 1.03-1.75 1.03H8.1zM8.5 11H10V9H7.56zM11 9v2h3V9zm3-1V6h-3v2zm3.11 1H15v2h1zm1.67-3H15v2h2.67zM6.14 6l.94 2H10V6z" />
        </svg>
      </div>
    </header>
    <main>
      <article class="grid grid-50">
        <div class="imagenProducto">
          <img src="' . $imagen . '" alt="" /> 
        </div>
        <div class="textoJ">
        <p class="tituloJuego">' . $titulo . '</p>
        <br>
        <p class="descripcionJuego">' . $descripcion . '</p>
        <br>
        <p class="precioJuego">' . $precio . '</p>
        <button class="grid add-to-cart" data-product="'. $titulo .'" data-price=' . $precio . '>Añadir a la cesta</button>
        </div>
      </article>
    </main>';
  ?>
      
         <div id="cart-sidebar" class="cart-sidebar">
        <div class="cart-header">
            <h2>Carrito de Compras</h2>
            <button class="close-cart">X</button>
        </div>
        <div class="cart-items">
            
        </div>
        <div class="cart-footer">
            <p>Total: <span id="total-price">$0.00</span></p>
            <button id="checkout">Ver Carrito</button>
        </div>
    </div>

  <footer class="grid grid-50">
    <div>
      <p>Teléfono +34 600 100 200</p>
      <p>Correo hyliangames@gmail.com</p>
    </div>
    <div>
      <h2>&copy;2024 Hylian Games. Todos los derechos reservados.</h2>
    </div>
  </footer>
  </div>
 
</body>

</html>