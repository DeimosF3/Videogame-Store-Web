<?php
include_once("./conectar.php");
$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$bbdd = "productos";
$conexion = new Conectar($servidor, $usuario, $contraseña, $bbdd);
if (isset($_GET["pagina"])) {
  $pagina = ($_GET["pagina"] - 1) * 12;
} else {
  $pagina = 0;
}
$productos = $conexion->recibir_datos("SELECT * FROM productos LIMIT 12 OFFSET  $pagina");
$contar_articulos = count($productos);
$paginas =  ($contar_articulos / 12) + 1;


?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hylian Games - Videojuegos</title>
  <link rel="stylesheet" href="./style.css" />
  <link rel="icon" href="./icon/avqakfe0a.webp" />
</head>

<body>
  <div class="grid todo">
    <header class="grid grid-40">
      <a href="./index.php">
        <h1>hylian games</h1>
      </a>
      <button>Videojuegos</button>
      <button>Accesorios</button>
      <button>Promociones</button>
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="48"
        height="48"
        viewBox="0 0 24 24">
        <path
          fill="currentColor"
          d="M19 20c0 1.11-.89 2-2 2a2 2 0 0 1-2-2c0-1.11.89-2 2-2a2 2 0 0 1 2 2M7 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2c1.11 0 2-.89 2-2s-.89-2-2-2m.2-3.37l-.03.12c0 .14.11.25.25.25H19v2H7a2 2 0 0 1-2-2c0-.35.09-.68.24-.96l1.36-2.45L3 4H1V2h3.27l.94 2H20c.55 0 1 .45 1 1c0 .17-.05.34-.12.5l-3.58 6.47c-.34.61-1 1.03-1.75 1.03H8.1zM8.5 11H10V9H7.56zM11 9v2h3V9zm3-1V6h-3v2zm3.11 1H15v2h1zm1.67-3H15v2h2.67zM6.14 6l.94 2H10V6z" />
      </svg>
    </header>
    <img
      width="100%"
      height="80%"
      src="./imgs/mult-compra-EASPORTFC25-s1225-h.jpg"
      alt="Imagen promocional videojuego EA FC25" />
    <hr />
    <main>
      <br />
      <article class="grid grid-33 centrar">
        <button class="todosJuegos">Todos los juegos</button>
      </article>
      <br>
      <article class="grid grid-33 centrar">
        <?php

        // Verificar si no hay articulos sale un mensaje y si lo hay los muestra    
        if ($contar_articulos < 1) {
          echo "<p>no se han encontrado articulos</p> ";
        } else {
          //  el $producto es una nueva variable que cambia para imprimir con nuevos nombres 
          // foreach($producto as $producto){
          //     $nombre = $producto["nombre"];
          // }
          for ($i = 0; $i < count($productos); $i++) {
            $id = $productos[$i]["id"];
            $titulo = $productos[$i]["titulo"];
            $precio = $productos[$i]["precio"];
            $imagen = $productos[$i]["imagen"];
            echo '    <div class="sombra">
      <a href="./producto.php?id=' . $id . '"><img
          width="200px"
          height="225"
          src="' . $imagen . '"
          alt="Videojuego Red Dead Redemption PS5" /></a>
      <p class="tituloJuego">' . $titulo . '</p>
      <p class="precioJuego">' . $precio . '</p>
    </div>';
          }
        }

        ?>
      </article>

      <!-- <div class="sombra">
          <a href="./producto.html"><img
              width="160px"
              height="225"
              src="./imgs/metaphor-refantazio-ps5.jpg"
              alt="Videojuego Red Dead Redemption PS5" /></a>
          <p class="tituloJuego">Metaphor Refantazio</p>
          <p class="precioJuego">69.<small>99</small>€</p>
        </div>
        <div class="sombra">
          <img
            width="260px"
            height="225"
            src="./imgs/sh2.png"
            alt="Videojuego Silent Hill 2 remake PS5" />
          <p class="tituloJuego">Silent Hill 2</p>
          <p class="precioJuego">69.99€</p>
        </div>
        <div class="sombra">
          <img
            width="260px"
            height="225"
            src="./imgs/tlou2.png"
            alt="Videojuego Red Dead Redemption PS5" />
          <p class="tituloJuego">The Last Of US 2 Remastered</p>
          <p class="precioJuego">39.99€</p>
        </div>
        <div class="sombra">
          <img
            width="260px"
            height="225"
            src="./imgs/gt7.png"
            alt="Videojuego Red Dead Redemption PS5" />
          <p class="tituloJuego">Gran Turismo 7</p>
          <p class="precioJuego">49.99€</p>
        </div>
   -->
      <br />
      <img
        class="promocion"
        src="./imgs/PS5-promo-PS5OTONO24-s2225-h.jpg"
        alt="" />
    </main>
    <hr />
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