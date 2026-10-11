<?php defined('ONEMAGIX') or exit('Acceso no permitido'); ?>
<!-- ===== GALERÍA (carrusel de imágenes) ===== -->
<section class="seccion" id="galeria">
    <div class="contenedor">
        <h2 class="seccion__titulo" data-animar>Galería</h2>
        <p class="seccion__subtitulo" data-animar>Algunos momentos de nuestros eventos.</p>

        <div class="carrusel" id="carrusel" data-animar>
            <div class="carrusel__pista">
                <!--
                    Para agregar una foto: guardala en assets/images/galeria/ (formato vertical 4:5)
                    y agregá otra diapositiva igual a las de abajo con su nombre de archivo.
                    Podés agregar o quitar diapositivas sin tocar el JavaScript.
                -->
                <div class="carrusel__diapositiva">
                    <div class="carrusel__marcador"><img src="<?= BASE_URL ?>assets/images/galeria/image1.jpg" alt="Descripción de la foto"></div>
                </div>
                <div class="carrusel__diapositiva">
                    <div class="carrusel__marcador"><img src="<?= BASE_URL ?>assets/images/galeria/image2.jpg" alt="Descripción de la foto"></div>
                </div>
                <div class="carrusel__diapositiva">
                    <div class="carrusel__marcador"><img src="<?= BASE_URL ?>assets/images/galeria/image3.jpg" alt="Descripción de la foto"></div>
                </div>
                <div class="carrusel__diapositiva">
                    <div class="carrusel__marcador"><img src="<?= BASE_URL ?>assets/images/galeria/image4.jpg" alt="Descripción de la foto"></div>
                </div>
                <div class="carrusel__diapositiva">
                    <div class="carrusel__marcador"><img src="<?= BASE_URL ?>assets/images/galeria/image5.jpg" alt="Descripción de la foto"></div>
                </div>
                <div class="carrusel__diapositiva">
                    <div class="carrusel__marcador"><img src="<?= BASE_URL ?>assets/images/galeria/image6.jpg" alt="Descripción de la foto"></div>
                </div>
                <div class="carrusel__diapositiva">
                    <div class="carrusel__marcador"><img src="<?= BASE_URL ?>assets/images/galeria/image7.jpg" alt="Descripción de la foto"></div>
                </div>
            </div>

            <button class="carrusel__flecha carrusel__flecha--anterior" aria-label="Imagen anterior">&#10094;</button>
            <button class="carrusel__flecha carrusel__flecha--siguiente" aria-label="Imagen siguiente">&#10095;</button>

            <!-- Los puntitos se crean solos con JavaScript -->
            <div class="carrusel__puntos"></div>
        </div>
    </div>
</section>