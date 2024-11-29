<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recibir los datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Validar campos
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        die("El correo proporcionado no es válido.");
    }

    // Configuración del correo
    $destinatario = "jimenanabelchoke7@gmail.com"; // Reemplaza con tu correo
    $contenido = "Has recibido un mensaje de contacto:\n\n";
    $contenido .= "Nombre: $nombre\n";
    $contenido .= "Correo: $correo\n\n";
    $contenido .= "Mensaje:\n$mensaje\n";

    $headers = "From: $correo\r\n";
    $headers .= "Reply-To: $correo\r\n";

    // Enviar el correo
    if (mail($destinatario, $contenido, $headers)) {
        echo "Mensaje enviado con éxito.";
    } else {
        echo "Hubo un error al enviar el mensaje. Inténtalo más tarde.";
    }
} else {
    echo "Acceso no permitido.";
}
