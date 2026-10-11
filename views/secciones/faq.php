<?php
defined('ONEMAGIX') or exit('Acceso no permitido');

// Preguntas frecuentes: agregá o cambiá las que quieras aquí.
$preguntas = [
    '¿Qué incluye exactamente la contratación de One Magix?'
    => 'Contamos con un salón totalmente equipado para hasta 200 personas, ambiente climatizado y un menú completo que acompaña toda la experiencia, desde la recepción hasta el fin de fiesta. Nos ocupamos de cada detalle: vajilla y mantelería, mozos, ambientación perimetral, iluminación de pista, sonido profesional, servicio de DJ, pantalla gigante y proyector, además de personal de limpieza y seguridad durante todo el evento. 👉 Vos solo te ocupás de disfrutar. Nosotros hacemos que todo funcione y se vea increíble.   ',
    '¿Ofrecen formas de pago y financiación?'
    => 'Sí, ofrecemos distintas formas de pago y financiación. Podés abonar en efectivo o por transferencia, y también contamos con cómodas opciones de financiación, que se conversan de manera personalizada con cada cliente según el servicio elegido.   Nuestro objetivo es que puedas planificar tu evento con tranquilidad y sin complicaciones ✨   ',
    '¿Cuentan con servicios adicionales?'
    => 'Sí, contamos con servicios adicionales. Además de los servicios incluidos en la contratación, ofrecemos servicios adicionales sin costo, pensados para realzar la experiencia del evento y sumar momentos únicos. Entre ellos se encuentran: barra libre, sillón Luis XV para los protagonistas, torta principal personalizada, letras luminosas con iniciales a elección y cabina espejada para fotos y videos.   👉 Pequeños detalles que transforman una fiesta en un recuerdo inolvidable.',
    '¿En qué se diferencia One Magix?'
    => 'One Magix se diferencia por ofrecer una experiencia completa y sin sorpresas.
Tenemos variedad de menús a elección, un precio que incluye salón y todos los servicios, regalos sin costo en la contratación y una atención directa con sus dueños, acompañándote en cada detalle.   👉 Todo pensado para que disfrutes tu evento con tranquilidad y confianza.', 
'¿Se encargan de la coordinación el día del evento?'
    => 'Sí, nos encargamos de la coordinación el día del evento.   
Contamos con personal completo para llevar adelante cada momento, respetando el cronograma y cuidando cada detalle, desde la recepción hasta la conducción del evento. 👉 Vos disfrutás, nosotros nos ocupamos de que todo fluya como corresponde.'
];
?>
<!-- ===== PREGUNTAS FRECUENTES (acordeón) ===== -->
<section class="seccion seccion--oscura" id="faq">
    <div class="contenedor contenedor--estrecho">
        <h2 class="seccion__titulo" data-animar>Preguntas frecuentes</h2>

        <div class="acordeon">
            <?php foreach ($preguntas as $pregunta => $respuesta): ?>
                <div class="acordeon__item" data-animar>
                    <button class="acordeon__pregunta" aria-expanded="false">
                        <?= e($pregunta) ?>
                        <span class="acordeon__icono" aria-hidden="true">+</span>
                    </button>
                    <div class="acordeon__respuesta">
                        <p><?= e($respuesta) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>