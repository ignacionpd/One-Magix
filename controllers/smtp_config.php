<?php
/**
 * Datos del servidor de correo (SMTP).
 * Este archivo está protegido: no se puede abrir desde el navegador
 * (lo bloquean controllers/.htaccess y la comprobación de abajo).
 *
 * Completá estos datos con los que te da tu hosting o tu proveedor de correo.
 */
defined('ONEMAGIX') or exit('Acceso no permitido');

return [
    'host'       => 'smtp.tudominio.com',     // Servidor SMTP
    'puerto'     => 587,                      // 587 (TLS) o 465 (SSL)
    'seguridad'  => 'tls',                    // 'tls' o 'ssl'
    'usuario'    => 'usuario@tudominio.com',  // Usuario de la cuenta de correo
    'clave'      => 'TU_CONTRASEÑA',          // Contraseña de la cuenta de correo

    'remitente'        => 'usuario@tudominio.com', // Desde qué cuenta se envía
    'remitente_nombre' => 'Web One Magix',
    'destinatario'     => 'info@onemagix.com.ar',  // Quién recibe los mensajes del formulario
];
