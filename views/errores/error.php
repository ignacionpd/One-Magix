<?php
defined('ONEMAGIX') or exit('Acceso no permitido');

// Código del error (lo envía el archivo .htaccess a través de index.php)
$error = $_GET['error'] ?? '';

$titulo = ($error === '403') ? 'Acceso no permitido' : 'Página no encontrada';
$texto  = ($error === '403')
    ? 'No tenés permiso para ver esta sección.'
    : 'La página que buscás no existe o fue movida.';
?>
<!-- ===== PÁGINA DE ERROR (404 / 403) ===== -->
<section class="seccion error">
    <div class="contenedor">
        <p class="error__codigo"><?= e($error) ?></p>
        <h1 class="seccion__titulo"><?= e($titulo) ?></h1>
        <p class="seccion__subtitulo"><?= e($texto) ?></p>
        <a href="<?= BASE_URL ?>" class="boton">Volver al inicio</a>
    </div>
</section>
