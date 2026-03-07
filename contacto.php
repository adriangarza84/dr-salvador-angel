<?php
// Script básico de procesamiento de formulario
header('Content-Type: application/json');

// Configuración
$to_email = "contacto@cirujanosplasticosmonterrey.com"; // Reemplazar con el correo real
$subject = "Nueva Solicitud de Consulta - Sitio Web";

// Función para sanitizar inputs
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Verificar si es una petición POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validar que los campos requeridos existan
    if (empty($_POST["nombre"]) || empty($_POST["email"]) || empty($_POST["telefono"]) || empty($_POST["mensaje"])) {
        http_response_code(400);
        echo json_encode(["status" => "error", "message" => "Todos los campos son obligatorios."]);
        exit;
    }

    $nombre = sanitize_input($_POST["nombre"]);
    $email = sanitize_input($_POST["email"]);
    $telefono = sanitize_input($_POST["telefono"]);
    $mensaje = sanitize_input($_POST["mensaje"]);
    $procedimiento = isset($_POST["procedimiento"]) ? sanitize_input($_POST["procedimiento"]) : "General";

    // Validar formato de email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo json_encode(["status" => "error", "message" => "Formato de correo inválido."]);
        exit;
    }

    // Construir el cuerpo del correo
    $email_body = "Se ha recibido una nueva solicitud de consulta desde el sitio web.\n\n";
    $email_body .= "Detalles del Contacto:\n";
    $email_body .= "------------------------\n";
    $email_body .= "Nombre: " . $nombre . "\n";
    $email_body .= "Email: " . $email . "\n";
    $email_body .= "Teléfono: " . $telefono . "\n";
    $email_body .= "Procedimiento de Interés: " . $procedimiento . "\n\n";
    $email_body .= "Mensaje:\n" . $mensaje . "\n";

    // Headers
    $headers = "From: webmaster@cirujanosplasticosmonterrey.com\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Enviar correo
    // Nota: Configurar el servidor SMTP adecuadamente en el entorno de host
    $mail_sent = @mail($to_email, $subject, $email_body, $headers);

    if ($mail_sent) {
        http_response_code(200);
        echo json_encode(["status" => "success", "message" => "Tu solicitud ha sido enviada exitosamente. Nos pondremos en contacto a la brevedad."]);
    } else {
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Hubo un problema al enviar el mensaje. Por favor intenta más tarde."]);
    }

} else {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Método no permitido."]);
}
?>
