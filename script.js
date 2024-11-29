  document.getElementById("contactForm").addEventListener("submit", async function (e) {
    e.preventDefault(); // Evita el envío tradicional del formulario

    const form = new FormData(this); // Captura los datos del formulario
    const respuestaDiv = document.getElementById("respuesta");

    try {
      const response = await fetch("submeter-formulario.php", {
        method: "POST",
        body: form
      });

      const data = await response.json();
      if (data.enviado) {
        respuestaDiv.innerHTML = "<p style='color: green;'>¡Mensaje enviado con éxito!</p>";
      } else {
        respuestaDiv.innerHTML = "<p style='color: red;'>Error al enviar el mensaje. Intenta nuevamente.</p>";
      }
    } catch (error) {
      respuestaDiv.innerHTML = "<p style='color: red;'>Error de conexión. Intenta más tarde.</p>";
    }
  });
