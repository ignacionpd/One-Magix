<?php
defined('ONEMAGIX') or exit('Acceso no permitido');

$enlaceWhatsapp = 'https://wa.me/' . CONTACTO_WHATSAPP;
?>
<!-- ===== CONTACTO (formulario) ===== -->
<section class="seccion" id="contacto">
    <div class="contenedor contenedor--estrecho">
        <h2 class="seccion__titulo" data-animar>Contacto</h2>
        <p class="seccion__subtitulo" data-animar>Contanos sobre tu evento y te respondemos a la brevedad.</p>

        <!-- Accesos directos: WhatsApp e Instagram -->
        <div class="contacto__accesos" data-animar>
            <a href="<?= e($enlaceWhatsapp) ?>" class="contacto__acceso" target="_blank" rel="noopener">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2zm0 18.2c-1.5 0-3-.4-4.2-1.2l-.3-.2-3 .8.8-2.9-.2-.3A8.2 8.2 0 1 1 12 20.2zm4.5-6.1c-.2-.1-1.5-.7-1.7-.8-.2-.1-.4-.1-.6.1l-.8 1c-.1.2-.3.2-.5.1a6.7 6.7 0 0 1-3.3-2.9c-.2-.4.2-.4.7-1.3.1-.2 0-.3 0-.4l-.8-1.8c-.2-.5-.4-.4-.6-.4h-.5c-.2 0-.4.1-.7.3-.2.3-.9.9-.9 2.2s.9 2.5 1 2.7c.1.2 1.8 2.8 4.4 3.9 1.6.7 2.3.8 3.1.6.5-.1 1.5-.6 1.7-1.2.2-.6.2-1.1.2-1.2-.1-.1-.3-.2-.6-.3z"/></svg>
                WhatsApp: <?= e(CONTACTO_WHATSAPP_TEXTO) ?>
            </a>
            <a href="<?= e(RED_INSTAGRAM) ?>" class="contacto__acceso" target="_blank" rel="noopener">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 7a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm0 8.2a3.2 3.2 0 1 1 0-6.4 3.2 3.2 0 0 1 0 6.4zM17.3 5.5a1.2 1.2 0 1 0 0 2.4 1.2 1.2 0 0 0 0-2.4zM12 2c-2.7 0-3 0-4.1.1C4.3 2.2 2.2 4.3 2.1 7.9 2 9 2 9.3 2 12s0 3 .1 4.1c.1 3.6 2.2 5.7 5.8 5.8 1.1.1 1.4.1 4.1.1s3 0 4.1-.1c3.6-.1 5.7-2.2 5.8-5.8.1-1.1.1-1.4.1-4.1s0-3-.1-4.1c-.1-3.6-2.2-5.7-5.8-5.8C15 2 14.7 2 12 2zm0 1.8c2.7 0 3 0 4 .1 2.6.1 3.9 1.4 4 4 .1 1 .1 1.3.1 4s0 3-.1 4c-.1 2.6-1.4 3.9-4 4-1 .1-1.3.1-4 .1s-3 0-4-.1c-2.6-.1-3.9-1.4-4-4-.1-1-.1-1.3-.1-4s0-3 .1-4c.1-2.6 1.4-3.9 4-4 1-.1 1.3-.1 4-.1z"/></svg>
                Instagram: @onemagix
            </a>
        </div>

        <!-- novalidate: la validación la hacemos nosotros con JavaScript (y luego PHP) -->
        <form class="formulario" id="formContacto" action="<?= BASE_URL ?>index.php?accion=contacto" method="post" novalidate data-animar>
            <div class="formulario__fila">
                <div class="formulario__campo">
                    <label for="nombre">Nombre *</label>
                    <input type="text" id="nombre" name="nombre" maxlength="50" autocomplete="given-name">
                    <small class="formulario__error"></small>
                                    </div>
                <div class="formulario__campo">
                    <label for="apellido">Apellido *</label>
                    <input type="text" id="apellido" name="apellido" maxlength="50" autocomplete="family-name">
                    <small class="formulario__error"></small>
                                    </div>
            </div>

            <div class="formulario__fila">
                <div class="formulario__campo">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" maxlength="30" autocomplete="email">
                    <small class="formulario__error"></small>
                                    </div>
                <div class="formulario__campo">
                    <label for="telefono">Teléfono *</label>
                    <input type="tel" id="telefono" name="telefono" maxlength="20" autocomplete="tel">
                    <small class="formulario__error"></small>
                                    </div>
            </div>

            <div class="formulario__campo">
                <label for="mensaje">Mensaje *</label>
                <textarea id="mensaje" name="mensaje" rows="5" maxlength="2000"></textarea>
                <small class="formulario__error"></small>
                            </div>

            <p class="formulario__nota">* Campo obligatorio</p>

            <button type="submit" class="boton" id="botonEnviar">Enviar mensaje</button>

            <!-- Aquí se muestra si el envío salió bien o mal -->
            <p class="formulario__resultado" id="resultadoFormulario" role="status"></p>
        </form>
    </div>
</section>
