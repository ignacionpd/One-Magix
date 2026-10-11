<?php
/**
 * Punto de entrada de la web (index en la raíz).
 * Todo pasa por aquí: decide qué mostrar o qué controlador usar.
 */

// Marca que indica que entramos por index.php.
// Los demás archivos PHP la comprueban para no poder abrirse solos.
define('ONEMAGIX', true);

require __DIR__ . '/config/config.php';

// 1) Envío del formulario de contacto (llega por POST desde assets/js/main.js)
if (($_GET['accion'] ?? '') === 'contacto') {
    require __DIR__ . '/controllers/ContactoController.php';
    exit;
}

// 2) Páginas de error (las envía el archivo .htaccess)
$error = $_GET['error'] ?? '';
if ($error === '404' || $error === '403') {
    http_response_code((int) $error);
    $esPaginaError = true; // los enlaces del menú vuelven a la portada
    require __DIR__ . '/views/layout/header.php';
    require __DIR__ . '/views/errores/error.php';
    require __DIR__ . '/views/layout/footer.php';
    exit;
}

// 3) Página principal: cada sección es una vista separada
require __DIR__ . '/views/layout/header.php';
require __DIR__ . '/views/secciones/inicio.php';
require __DIR__ . '/views/secciones/galeria.php';
require __DIR__ . '/views/secciones/nosotros.php';
require __DIR__ . '/views/secciones/promociones.php';
require __DIR__ . '/views/secciones/faq.php';
require __DIR__ . '/views/secciones/contacto.php';
require __DIR__ . '/views/layout/footer.php';
