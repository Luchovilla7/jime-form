<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Configuración del correo
    $destinatario = "jimenaanabelchoke7@gmail.com"; // Cambiar por tu correo
    $asunto = "Nuevo mensaje de $nombre";
    $contenido = "Nombre: $nombre\nEmail: $email\nMensaje:\n$mensaje";

    // Enviar correo
    $enviado = mail($destinatario, $asunto, $contenido);

    // Respuesta en formato JSON
    echo json_encode(['enviado' => $enviado]);
    exit;
}
