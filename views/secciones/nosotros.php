<?php defined('ONEMAGIX') or exit('Acceso no permitido'); ?>
<!-- ===== NOSOTROS (video de un lado, texto del otro) ===== -->
<section class="seccion seccion--oscura" id="nosotros">
    <div class="contenedor dos-columnas">
        <div class="dos-columnas__video" data-animar="izquierda">
            <!--
                Video en assets/video/video_one_magix.mp4
                No se reproduce solo: el visitante lo inicia (y activa el sonido) con los controles.
            -->
            <video id="videoNosotros" controls autoplay muted playsinline preload="metadata" poster="<?= BASE_URL ?>assets/images/logo.jpg">
                <source src="<?= BASE_URL ?>assets/video/video_one_magix.mp4" type="video/mp4">
                Tu navegador no puede reproducir este video.
            </video>
        </div>

        <div class="dos-columnas__texto" data-animar="derecha">
            <h2 class="seccion__titulo">Hacemos magia con cada detalle</h2>
            <p>En One Magix acompañamos cada etapa de tu evento: la idea, la organización y el gran día.</p>
            <p>Nuestro objetivo es que vos y tus invitados solo se preocupen por disfrutar.</p>
            <a href="#contacto" class="boton">Hablemos</a>
        </div>
    </div>
</section>
