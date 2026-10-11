<?php
defined('ONEMAGIX') or exit('Acceso no permitido');

// En las páginas de error los enlaces del menú apuntan a la portada.
$prefijo = !empty($esPaginaError) ? BASE_URL : '';
$enlaceWhatsapp = 'https://wa.me/' . CONTACTO_WHATSAPP;
?>
</main>

<!-- ===== FOOTER ===== -->
<footer class="footer">
    <div class="contenedor footer__contenido">

        <div class="footer__marca">
            <img src="<?= BASE_URL ?>assets/images/logo.jpg" alt="Logo One Magix" class="footer__logo">
            <p>Eventos &amp; Experiencias</p>
        </div>

        <nav class="footer__menu" aria-label="Menú del footer">
            <h3>Secciones</h3>
            <ul>
                <?php foreach (menu_enlaces() as $ancla => $texto): ?>
                    <li><a href="<?= $prefijo ?>#<?= $ancla ?>"><?= e($texto) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <div class="footer__contacto">
            <h3>Contacto</h3>
            <ul>
                <li><a href="<?= e($enlaceWhatsapp) ?>" target="_blank" rel="noopener"><?= e(CONTACTO_WHATSAPP_TEXTO) ?></a></li>
                <li><a href="<?= e(UBICACION_ENLACE) ?>" target="_blank" rel="noopener"> <?= e(UBICACION_DIRECCION) ?></a></li>
            </ul>

            <!-- Iconos de redes sociales -->
            <div class="redes">
                <a href="<?= e(RED_INSTAGRAM) ?>" target="_blank" rel="noopener" aria-label="Instagram">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 7a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm0 8.2a3.2 3.2 0 1 1 0-6.4 3.2 3.2 0 0 1 0 6.4zM17.3 5.5a1.2 1.2 0 1 0 0 2.4 1.2 1.2 0 0 0 0-2.4zM12 2c-2.7 0-3 0-4.1.1C4.3 2.2 2.2 4.3 2.1 7.9 2 9 2 9.3 2 12s0 3 .1 4.1c.1 3.6 2.2 5.7 5.8 5.8 1.1.1 1.4.1 4.1.1s3 0 4.1-.1c3.6-.1 5.7-2.2 5.8-5.8.1-1.1.1-1.4.1-4.1s0-3-.1-4.1c-.1-3.6-2.2-5.7-5.8-5.8C15 2 14.7 2 12 2zm0 1.8c2.7 0 3 0 4 .1 2.6.1 3.9 1.4 4 4 .1 1 .1 1.3.1 4s0 3-.1 4c-.1 2.6-1.4 3.9-4 4-1 .1-1.3.1-4 .1s-3 0-4-.1c-2.6-.1-3.9-1.4-4-4-.1-1-.1-1.3-.1-4s0-3 .1-4c.1-2.6 1.4-3.9 4-4 1-.1 1.3-.1 4-.1z"/></svg>
                </a>
                <!--<a href="<?= e(RED_FACEBOOK) ?>" target="_blank" rel="noopener" aria-label="Facebook">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13.5 22v-8.2h2.8l.4-3.2h-3.2V8.5c0-.9.3-1.6 1.6-1.6h1.7V4.1c-.3 0-1.3-.1-2.5-.1-2.5 0-4.2 1.5-4.2 4.3v2.4H7.3v3.2h2.8V22h3.4z"/></svg>
                </a>
                <a href="<?= e(RED_TIKTOK) ?>" target="_blank" rel="noopener" aria-label="TikTok">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M16.6 5.8A4.3 4.3 0 0 1 15.5 3h-3.1v12.4a2.6 2.6 0 1 1-2.6-2.6c.3 0 .5 0 .8.1V9.7a5.7 5.7 0 1 0 4.9 5.7V9.1a7.3 7.3 0 0 0 4.3 1.4V7.4a4.3 4.3 0 0 1-3.2-1.6z"/></svg>
                </a>-->
                <a href="<?= e($enlaceWhatsapp) ?>" target="_blank" rel="noopener" aria-label="WhatsApp">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2zm0 18.2c-1.5 0-3-.4-4.2-1.2l-.3-.2-3 .8.8-2.9-.2-.3A8.2 8.2 0 1 1 12 20.2zm4.5-6.1c-.2-.1-1.5-.7-1.7-.8-.2-.1-.4-.1-.6.1l-.8 1c-.1.2-.3.2-.5.1a6.7 6.7 0 0 1-3.3-2.9c-.2-.4.2-.4.7-1.3.1-.2 0-.3 0-.4l-.8-1.8c-.2-.5-.4-.4-.6-.4h-.5c-.2 0-.4.1-.7.3-.2.3-.9.9-.9 2.2s.9 2.5 1 2.7c.1.2 1.8 2.8 4.4 3.9 1.6.7 2.3.8 3.1.6.5-.1 1.5-.6 1.7-1.2.2-.6.2-1.1.2-1.2-.1-.1-.3-.2-.6-.3z"/></svg>
                </a>
                <a href="<?= e(UBICACION_ENLACE) ?>" target="_blank" rel="noopener" aria-label="Ubicación">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2a7 7 0 0 0-7 7c0 5.2 7 13 7 13s7-7.8 7-13a7 7 0 0 0-7-7zm0 9.5A2.5 2.5 0 1 1 12 6.500a2.5 2.5 0 0 1 0 5z"/></svg>
                </a>
            </div>
        </div>
    </div>

    <p class="footer__derechos">
        &copy; <?= date('Y') ?> One Magix. Todos los derechos reservados.
    </p>
</footer>

<!-- Librerías de animación cargadas por CDN (sin instalar nada) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanta@0.5.24/dist/vanta.net.min.js"></script>

<!-- Scripts propios -->
<script src="<?= BASE_URL ?>assets/js/main.js"></script>
<script src="<?= BASE_URL ?>assets/js/animaciones.js"></script>
</body>
</html>
