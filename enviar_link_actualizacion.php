<?php
// Enviar el correo electrónico con el enlace de actualización de contraseña
function enviarCorreoRecuperacion($email, $token) {
    $para = $email;
    $asunto = 'Recuperación de Contraseña';
    $mensaje = 'Hola, 
    Para cambiar tu contraseña, haz clic en el siguiente enlace:
    <a href="http://tu_sitio_web.com/actualizar_password.php?token=' . $token . '">Actualizar Contraseña</a>';

    $cabeceras = "From: info@tu_sitio_web.com\r\n";
    $cabeceras .= "Content-type: text/html; charset=UTF-8\r\n";

    // Envío del correo electrónico
    mail($para, $asunto, $mensaje, $cabeceras);
}

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el correo electrónico ingresado por el usuario
    $email = $_POST['email'];

    // Generar un token único para el enlace de actualización
    $token = md5(uniqid(rand(), true));

    // Aquí deberías almacenar el token en tu base de datos junto con el correo electrónico y una fecha de expiración (si es necesario).

    // Luego, envía el correo electrónico con el enlace de actualización
    enviarCorreoRecuperacion($email, $token);

    // Puedes mostrar un mensaje de éxito en esta página o redirigir al usuario a otra página.
    echo "Se ha enviado un enlace de actualización de contraseña a tu correo electrónico.";
}
?>