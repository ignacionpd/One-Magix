<?php
defined('ONEMAGIX') or exit('Acceso no permitido');

// En las páginas de error los enlaces del menú apuntan a la portada.
$prefijo = !empty($esPaginaError) ? BASE_URL : '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e(SITIO_NOMBRE) ?></title>
    <meta name="description" content="<?= e(SITIO_DESCRIPCION) ?>">

    <!-- Favicon (usa el mismo logo) -->
    <link rel="icon" type="image/jpeg" href="<?= BASE_URL ?>assets/images/logo.jpg">

    <!-- Tipografías -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:wght@500;700&display=swap" rel="stylesheet">

    <!-- Estilos propios -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/estilos.css">
</head>
<body>

<!-- ===== CABECERA FIJA ===== -->
<header class="cabecera" id="cabecera">
    <div class="contenedor cabecera__contenido">
        <a href="<?= $prefijo ?>#inicio" class="cabecera__logo" aria-label="Ir al inicio">
            <img src="<?= BASE_URL ?>assets/images/logo.jpg" alt="Logo One Magix">
        </a>

        <!-- Botón de menú para móvil -->
        <button class="cabecera__boton-menu" id="botonMenu" aria-label="Abrir menú" aria-expanded="false" aria-controls="menuPrincipal">
            <span></span><span></span><span></span>
        </button>

        <nav class="menu" id="menuPrincipal" aria-label="Menú principal">
            <ul>
                <?php foreach (menu_enlaces() as $ancla => $texto): ?>
                    <li><a href="<?= $prefijo ?>#<?= $ancla ?>"><?= e($texto) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</header>

<main>
