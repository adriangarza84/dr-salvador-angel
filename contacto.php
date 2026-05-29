<?php
// Procesamiento de formulario de contacto
$envFile = __DIR__ . '/.env';
$to_email = "contacto@cirujanosplasticosmonterrey.com"; // Fallback

if (file_exists($envFile)) {
    $envVariables = parse_ini_file($envFile);
    if (isset($envVariables['CONTACT_EMAIL'])) {
        $to_email = $envVariables['CONTACT_EMAIL'];
    }
}

$subject = "Nueva Solicitud de Consulta - Sitio Web";

function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar que los campos obligatorios existan (mensaje ya no es obligatorio)
    // Soportamos tanto 'email' como 'correo' por si hay diferentes formularios
    $email_input = isset($_POST["correo"]) ? $_POST["correo"] : (isset($_POST["email"]) ? $_POST["email"] : '');
    
    if (empty($_POST["nombre"]) || empty($email_input) || empty($_POST["telefono"])) {
        echo "Error: Los campos Nombre, Correo y Teléfono son obligatorios.";
        echo "<br><a href='javascript:history.back()'>Regresar</a>";
        exit;
    }

    $nombre = sanitize_input($_POST["nombre"]);
    $email = sanitize_input($email_input);
    $telefono = sanitize_input($_POST["telefono"]);
    $mensaje = isset($_POST["mensaje"]) ? sanitize_input($_POST["mensaje"]) : "";
    $procedimiento = isset($_POST["procedimiento"]) ? sanitize_input($_POST["procedimiento"]) : "General";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Error: Formato de correo inválido.";
        echo "<br><a href='javascript:history.back()'>Regresar</a>";
        exit;
    }

    $email_body = "Se ha recibido una nueva solicitud de consulta desde el sitio web.\n\n";
    $email_body .= "Detalles del Contacto:\n";
    $email_body .= "------------------------\n";
    $email_body .= "Nombre: " . $nombre . "\n";
    $email_body .= "Email: " . $email . "\n";
    $email_body .= "Teléfono: " . $telefono . "\n";
    $email_body .= "Procedimiento de Interés: " . $procedimiento . "\n\n";
    $email_body .= "Mensaje:\n" . $mensaje . "\n";

    $headers = "From: webmaster@" . (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'sitioweb.com') . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    @mail($to_email, $subject, $email_body, $headers);

    header("Location: gracias.html");
    exit;
} else {
    echo "Método no permitido.";
}
?>
