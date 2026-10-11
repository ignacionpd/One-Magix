<?php defined('ONEMAGIX') or exit('Acceso no permitido'); ?>
<!-- ===== PROMOCIONES (flyers) ===== -->
<section class="seccion" id="promociones">
    <div class="contenedor contenedor--ancho">
        <h2 class="seccion__titulo" data-animar>Promociones</h2>
        <p class="seccion__subtitulo" data-animar>Conocé nuestras propuestas vigentes.</p>

        <div class="flyers">
            <!--
                Para agregar un flyer: guardalo en assets/images/flyers/
                y cambiá el <div class="flyer__marcador"> por:
                <img src="<?= BASE_URL ?>assets/images/flyers/flyer1.jpg" alt="Descripción del flyer">
            -->
            <article class="flyer" data-animar>
                <div class="flyer__marcador"><img src="<?= BASE_URL ?>assets/images/flyers/flyer1.jpg" alt="Descripción del flyer"></div>
            </article>
            <article class="flyer" data-animar>
                <div class="flyer__marcador"><img src="<?= BASE_URL ?>assets/images/flyers/flyer2.jpg" alt="Descripción del flyer"></div>
            </article>
            <article class="flyer" data-animar>
                <div class="flyer__marcador"><img src="<?= BASE_URL ?>assets/images/flyers/flyer3.jpg" alt="Descripción del flyer"></div>
            </article>
        </div>
    </div>
</section>
