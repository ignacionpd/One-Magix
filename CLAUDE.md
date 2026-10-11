# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Qué es

Web "One Magix | Eventos & Experiencias": una sola página en PHP/HTML/CSS/JS sin framework ni build. Corre en XAMPP (`C:\xampp\htdocs\PROYECTOS\One Magix`).

## Comandos

No hay build, linter ni tests automáticos. Para probar:

- Servidor local: `php -S 127.0.0.1:8099 -t .` desde la raíz (o abrir `localhost/PROYECTOS/One Magix/` en XAMPP).
- Sintaxis PHP: `php -l <archivo>`; JS: `node --check assets/js/main.js`.
- Con `MODO_DESARROLLO=true` los errores de PHP salen en pantalla: revisar que `/`, `/?error=404` y `/?error=403` no muestren Warning/Notice.
- Pruebas visuales: Playwright/Chromium en escritorio (1440x900), tablet (820x1180) y móvil (390x844). Chromium sin GPU recorta el canvas de Vanta y no decodifica el video h264; son límites del entorno de pruebas, no bugs.

## Arquitectura

- `index.php` es el único punto de entrada. Define `ONEMAGIX` (los demás PHP hacen `defined('ONEMAGIX') or exit`), carga `config/config.php` y decide: POST de contacto (`?accion=contacto` → `controllers/ContactoController.php`, responde JSON), páginas de error (`?error=403|404`, enviadas por los `.htaccess`) o la portada, que incluye en orden `views/secciones/{inicio,galeria,nosotros,promociones,faq,contacto}.php` entre `views/layout/header.php` y `footer.php`.
- `config/config.php` centraliza constantes (WhatsApp, ubicación, redes, `MODO_DESARROLLO`), `BASE_URL` (calculada desde `SCRIPT_NAME`, por eso todos los assets usan `<?= BASE_URL ?>`), `e()` para escapar y `menu_enlaces()` (fuente única del menú de header y footer). Header y footer calculan sus propias variables (`$prefijo`, `$enlaceWhatsapp`) para no depender de otros archivos.
- El formulario valida dos veces con las mismas reglas y mensajes: `iniciarFormulario()` en `assets/js/main.js` y `ContactoController.php`. Cualquier cambio de regla se hace en ambos. El envío usa PHPMailer (`controllers/phpmailer/`) con datos de `controllers/smtp_config.php`, hoy con valores de ejemplo: el envío real no está probado.
- Cada push a `main` publica el sitio en InfinityFree (`.github/workflows/deploy-infinityfree.yml`; no sube `smtp_config.php`, que está en `.gitignore` y se coloca a mano en el servidor). Los `.htaccess` (raíz, `config/`, `controllers/`, `views/`) bloquean el acceso directo y mapean errores a `index.php?error=`.

## Front-end

- Las imágenes de galería, flyers y el video (`assets/images/galeria`, `assets/images/flyers`, `assets/video`) los carga el usuario en su equipo; no están en este repositorio.
- Animación al hacer scroll: `[data-animar]` (+ `izquierda`/`derecha`) dentro de `.animar-scroll`; `animarAlHacerScroll()` en `animaciones.js` usa IntersectionObserver para alternar `.visible`. Un intento anterior con GSAP ScrollTrigger fallaba al redimensionar: no volver a usarlo. GSAP solo anima la entrada de la portada. `.seccion` tiene `overflow-x: clip` para evitar scroll horizontal por los desplazamientos ocultos.
- Fondo de la portada: Vanta NET por defecto (`EFECTO_PORTADA`); se puede probar `?efecto=red|ondas|niebla|destellos`. GSAP, three y Vanta se cargan por CDN al final del footer, antes de `main.js` y `animaciones.js`.
- Carrusel: propio (sin librería), imágenes 4:5 posicionadas en círculo con `--pos` calculado en `iniciarCarrusel()`; el tamaño sale de `--ancho-diapositiva` (500px en escritorio, 400px en tablet, 270px en móvil chico).
- El video de Nosotros es vertical (9:16): arranca solo y en silencio (`autoplay muted`), con controles para activar el sonido.

## Reglas de trabajo

- Hacer solo lo pedido: sin funcionalidades, dependencias, frameworks ni pasos de build por cuenta propia.
- No cambiar lo que ya funciona; cambios pequeños y enfocados. Preguntar antes de crear archivos nuevos o hacer modificaciones importantes.
- Probar en móvil, tablet y escritorio, sin errores, antes de avisar. Al terminar, resumir qué cambió y qué decisiones hay que revisar.
- Interfaz en español, hora de Argentina, diseño limpio y responsive (el móvil debe verse bien).
- Código simple, nombres descriptivos, comentarios solo donde aporten.
- Datos sensibles (como `smtp_config.php`) nunca a GitHub.
