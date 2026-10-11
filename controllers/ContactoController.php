<?php
/**
 * Controlador del formulario de contacto.
 * 1) Recibe los datos  2) Los valida  3) Envía el correo con PHPMailer
 * Responde siempre en formato JSON para que lo lea assets/js/main.js
 */
defined('ONEMAGIX') or exit('Acceso no permitido');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/phpmailer/Exception.php';
require __DIR__ . '/phpmailer/PHPMailer.php';
require __DIR__ . '/phpmailer/SMTP.php';

header('Content-Type: application/json; charset=utf-8');

/**
 * Envía la respuesta al navegador y termina.
 */
function responder($ok, $mensaje, $errores = [])
{
    echo json_encode([
        'ok'      => $ok,
        'mensaje' => $mensaje,
        'errores' => $errores,
    ]);
    exit;
}

// Solo aceptamos envíos por POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    responder(false, 'Método no permitido.');
}

// --- 1) Recoger los datos (quitando espacios sobrantes) ---
$nombre   = trim($_POST['nombre'] ?? '');
$apellido = trim($_POST['apellido'] ?? '');
$email    = trim($_POST['email'] ?? '');
$telefono = trim($_POST['telefono'] ?? '');
$mensaje  = trim($_POST['mensaje'] ?? '');

// --- 2) Validar (las mismas reglas y mensajes que en JavaScript) ---
$errores = [];
$soloLetras = '/^[\p{L}\s\'-]{2,50}$/u';
// Mensaje: letras, números, espacios, saltos de línea y . , ; : - ( ) ¿ ? ¡ ! ' " @ /
$caracteresMensaje = '/^[\p{L}\p{N}\s.,;:\-()¿?¡!\'"@\/]+$/u';

if (!preg_match($soloLetras, $nombre)) {
    $errores['nombre'] = 'El nombre debe tener entre 2 y 50 caracteres y solo puede contener letras, espacios, guion (-) o apóstrofo (\').';
}

if (!preg_match($soloLetras, $apellido)) {
    $errores['apellido'] = 'El apellido debe tener entre 2 y 50 caracteres y solo puede contener letras, espacios, guion (-) o apóstrofo (\').';
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 30) {
    $errores['email'] = 'Ingresá un email válido, por ejemplo nombre@dominio.com (máximo 30 caracteres).';
}

if (!preg_match('/^\+?[0-9\s()-]{8,20}$/', $telefono)) {
    $errores['telefono'] = 'El teléfono debe tener entre 8 y 20 caracteres y solo puede contener números, espacios, + al inicio, paréntesis () y guion (-).';
}

if (mb_strlen($mensaje) < 10 || mb_strlen($mensaje) > 2000 || !preg_match($caracteresMensaje, $mensaje)) {
    $errores['mensaje'] = 'El mensaje debe tener entre 10 y 2000 caracteres y solo puede contener letras, números y los signos . , ; : - ( ) ¿ ? ¡ ! \' " @ /';
}

if (!empty($errores)) {
    http_response_code(422);
    responder(false, 'Revisá los campos marcados.', $errores);
}

// --- 3) Enviar el correo ---
$smtp = require __DIR__ . '/smtp_config.php';
$correo = new PHPMailer(true); // true = avisa los errores con excepciones

try {
    // Conexión con el servidor SMTP
    $correo->isSMTP();
    $correo->Host       = $smtp['host'];
    $correo->SMTPAuth   = true;
    $correo->Username   = $smtp['usuario'];
    $correo->Password   = $smtp['clave'];
    $correo->SMTPSecure = $smtp['seguridad'] === 'ssl' ? PHPMailer::ENCRYPTION_SMTPS : PHPMailer::ENCRYPTION_STARTTLS;
    $correo->Port       = $smtp['puerto'];
    $correo->CharSet    = 'UTF-8';
    $correo->Timeout    = 15; // segundos máximos de espera

    // Quién envía, quién recibe y a quién se responde
    $correo->setFrom($smtp['remitente'], $smtp['remitente_nombre']);
    $correo->addAddress($smtp['destinatario']);
    $correo->addReplyTo($email, "$nombre $apellido");

    // Contenido del mensaje
    $correo->isHTML(true);
    $correo->Subject = "Nueva consulta web de $nombre $apellido";
    $correo->Body = '
        <h2>Nueva consulta desde la web</h2>
        <p><strong>Nombre:</strong> ' . e($nombre) . ' ' . e($apellido) . '</p>
        <p><strong>Email:</strong> ' . e($email) . '</p>
        <p><strong>Teléfono:</strong> ' . e($telefono) . '</p>
        <p><strong>Mensaje:</strong><br>' . nl2br(e($mensaje)) . '</p>';
    $correo->AltBody = "Nombre: $nombre $apellido\nEmail: $email\nTeléfono: $telefono\n\nMensaje:\n$mensaje";

    $correo->send();
    responder(true, 'Mensaje enviado');
} catch (Exception $ex) {
    http_response_code(500);
    // En modo desarrollo mostramos el motivo real para poder corregirlo
    $detalle = MODO_DESARROLLO ? ' (Detalle: ' . $correo->ErrorInfo . ')' : '';
    responder(false, 'No pudimos enviar el mensaje. Probá de nuevo más tarde o escribinos por WhatsApp.' . $detalle);
}
