<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
    <script>
        window.onload = () => {
            const botonAbrir = document.querySelector(".derecha button");
            botonAbrir.onclick = () => {
                const conversacion = document.querySelector(".chat div");
                conversacion.classList.toggle("abierta");
                let texto = botonAbrir.innerText;
                if (texto == "Abrir chat") {
                    botonAbrir.innerText = "Cerrar chat";
                } else {
                    botonAbrir.innerText = "Abrir chat";
                }
            }
            //\\PC18567\htdocs
            const enviar = document.querySelector("#enviar");
            enviar.onclick = () => {
                const texto = document.querySelector(".chat input").value;
                document.querySelector(".chat input").value = "";
                fetch("./mensajes.php", {
                        body: JSON.stringify({
                            mensaje: texto
                        }),
                        method: "POST"
                    })
                    .then(respuesta => {
                        return respuesta.text()
                    })
                    .then(respuesta2 => {
                        const parrafo = document.createElement("p");
                        parrafo.className = "servidor";
                        parrafo.innerText = respuesta2;

                        const conversacion = document.querySelector(".conversacion");
                        conversacion.appendChild(parrafo);
                    });
            }
        }
    </script>
</head>

<body>
    <div class="chat">
        <div>
            <div class="conversacion">
                <p class="respuesta">Hola, que quieres preguntarme</p>
            </div>
            <input placeholder="Escribe tu mensaje">
            <button id="enviar">Enviar</button>
        </div>
        <div class="derecha">
            <button class="abrir-chat">Abrir chat</button>
        </div>
    </div>
    <div class="login grid">
        <label for="nombreUsuario">Nombre de Usuario:</label>
        <input type="text">
        <br>
        <label for="contra">Contraseña:</label>
        <input type="password">
        <br>
      <button class="enviar-login">Enviar</button>
    </div>
</body>

</html>