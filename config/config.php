<?php
/**
 * Configuración general de la web.
 * Cambiá aquí los datos de contacto y las redes sociales.
 */

// Evita que este archivo se abra directamente.
defined('ONEMAGIX') or exit('Acceso no permitido');

// --- Zona horaria ---
// Toda la web (fechas del footer, hora de los correos, etc.) usa la hora de Argentina,
// sin importar dónde esté el servidor.
date_default_timezone_set('America/Argentina/Buenos_Aires');

// --- Modo desarrollo ---
// true  = muestra los errores de PHP en pantalla (para programar en tu PC).
// false = los oculta (usalo cuando la web esté publicada).
define('MODO_DESARROLLO', true);

if (MODO_DESARROLLO) {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
} else {
    error_reporting(0);
    ini_set('display_errors', '0');
}

// --- Dirección base de la web ---
// Se calcula sola (sirve tanto en XAMPP como en el hosting). Ej: /PROYECTOS/One Magix/
define('BASE_URL', rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/') . '/');

// --- Datos del sitio ---
define('SITIO_NOMBRE', 'One Magix | Eventos & Experiencias');
define('SITIO_DESCRIPCION', 'One Magix organiza casamientos, cumpleaños de 15 y eventos inolvidables en Argentina.');

// --- Datos de contacto (se muestran en el footer) ---
define('CONTACTO_WHATSAPP', '5491133832145');        // Código de país + área + número, sin espacios ni "+"
define('CONTACTO_WHATSAPP_TEXTO', '11 3383-2145');   // Cómo se muestra el número en el footer

// --- Ubicación (se muestra en el footer y abre Google Maps) ---
define('UBICACION_DIRECCION', 'Muñoz 1710, San Miguel');
define('UBICACION_ENLACE', 'https://www.google.com/maps/search/?api=1&query=' . urlencode('Muñoz 1710, San Miguel, Buenos Aires, Argentina'));

// --- Redes sociales (reemplazá "#" por tus enlaces reales) ---
define('RED_INSTAGRAM', 'https://www.instagram.com/onemagix/');
define('RED_FACEBOOK', '#');
define('RED_TIKTOK', '#');

/**
 * Escapa un texto antes de mostrarlo en el HTML (evita problemas de seguridad).
 */
function e($texto)
{
    return htmlspecialchars((string) $texto, ENT_QUOTES, 'UTF-8');
}

/**
 * Enlaces del menú (se usan en la cabecera y en el footer).
 * Formato: 'ancla' => 'Texto que se muestra'
 */
function menu_enlaces()
{
    return [
        'inicio'      => 'Inicio',
        'galeria'     => 'Galería',
        'nosotros'    => 'Nosotros',
        'promociones' => 'Promociones',
        'faq'         => 'Preguntas',
        'contacto'    => 'Contacto',
    ];
}
