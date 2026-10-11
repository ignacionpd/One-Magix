/* ==========================================================
   One Magix - Funcionalidad principal
   (menú móvil, carrusel, acordeón y formulario de contacto)
   ========================================================== */

document.addEventListener('DOMContentLoaded', function () {
    iniciarMenu();
    iniciarCarrusel();
    iniciarAcordeon();
    iniciarFormulario();
});

/* ---------- 1) Menú para móvil y tablet ---------- */
function iniciarMenu() {
    var boton = document.getElementById('botonMenu');
    var menu = document.getElementById('menuPrincipal');
    if (!boton || !menu) return;

    function cerrar() {
        menu.classList.remove('abierto');
        boton.classList.remove('activo');
        boton.setAttribute('aria-expanded', 'false');
    }

    boton.addEventListener('click', function () {
        var abierto = menu.classList.toggle('abierto');
        boton.classList.toggle('activo', abierto);
        boton.setAttribute('aria-expanded', abierto ? 'true' : 'false');
    });

    // Al elegir una opción, el menú se cierra solo
    menu.querySelectorAll('a').forEach(function (enlace) {
        enlace.addEventListener('click', cerrar);
    });
}

/* ---------- 2) Carrusel de imágenes ----------
   Muestra varias imágenes a la vez: la activa (completa) al centro y las demás
   casi transparentes a los costados, para ver cuál viene y cuál se fue. */
function iniciarCarrusel() {
    var carrusel = document.getElementById('carrusel');
    if (!carrusel) return;

    var diapositivas = carrusel.querySelectorAll('.carrusel__diapositiva');
    var contenedorPuntos = carrusel.querySelector('.carrusel__puntos');
    var actual = 0;
    var temporizador;

    // Crear un puntito por cada diapositiva
    diapositivas.forEach(function (_, i) {
        var punto = document.createElement('button');
        punto.className = 'carrusel__punto';
        punto.setAttribute('aria-label', 'Ir a la imagen ' + (i + 1));
        punto.addEventListener('click', function () {
            irA(i);
            reiniciarAuto();
        });
        contenedorPuntos.appendChild(punto);
    });
    var puntos = contenedorPuntos.querySelectorAll('.carrusel__punto');

    function irA(numero) {
        var total = diapositivas.length;
        // Si pasamos del final volvemos al principio (y al revés)
        actual = (numero + total) % total;
        diapositivas.forEach(function (d, i) {
            // Posición respecto a la activa, en círculo: ... -2, -1, 0, 1, 2 ...
            var pos = ((i - actual + total + Math.floor(total / 2)) % total) - Math.floor(total / 2);
            var distancia = Math.abs(pos);
            d.style.setProperty('--pos', pos);
            d.classList.toggle('activa', distancia === 0);
            d.classList.toggle('vecina', distancia === 1);
            d.classList.toggle('lejana', distancia === 2);
        });
        puntos.forEach(function (p, i) {
            p.classList.toggle('activo', i === actual);
        });
    }

    function reiniciarAuto() {
        clearInterval(temporizador);
        temporizador = setInterval(function () { irA(actual + 1); }, 5000);
    }

    carrusel.querySelector('.carrusel__flecha--anterior').addEventListener('click', function () {
        irA(actual - 1);
        reiniciarAuto();
    });
    carrusel.querySelector('.carrusel__flecha--siguiente').addEventListener('click', function () {
        irA(actual + 1);
        reiniciarAuto();
    });

    // Al tocar una imagen del costado, pasa a ser la activa
    diapositivas.forEach(function (d, i) {
        d.addEventListener('click', function () {
            if (i !== actual) {
                irA(i);
                reiniciarAuto();
            }
        });
    });

    irA(0);
    reiniciarAuto();
}

/* ---------- 3) Acordeón de preguntas frecuentes ---------- */
function iniciarAcordeon() {
    var items = document.querySelectorAll('.acordeon__item');

    items.forEach(function (item) {
        var pregunta = item.querySelector('.acordeon__pregunta');
        var respuesta = item.querySelector('.acordeon__respuesta');

        pregunta.addEventListener('click', function () {
            var estabaAbierto = item.classList.contains('abierto');

            // Cerramos todos...
            items.forEach(function (otro) {
                otro.classList.remove('abierto');
                otro.querySelector('.acordeon__pregunta').setAttribute('aria-expanded', 'false');
                otro.querySelector('.acordeon__respuesta').style.maxHeight = null;
            });

            // ...y abrimos este (si estaba cerrado)
            if (!estabaAbierto) {
                item.classList.add('abierto');
                pregunta.setAttribute('aria-expanded', 'true');
                respuesta.style.maxHeight = respuesta.scrollHeight + 'px';
            }
        });
    });
}

/* ---------- 4) Formulario de contacto ---------- */
function iniciarFormulario() {
    var formulario = document.getElementById('formContacto');
    if (!formulario) return;

    var resultado = document.getElementById('resultadoFormulario');
    var botonEnviar = document.getElementById('botonEnviar');

    // Mismas reglas y mensajes que en PHP (controllers/ContactoController.php).
    // Cada regla devuelve '' si el valor es válido, o el texto del error.
    // Un campo vacío muestra la misma regla (el asterisco * ya indica que es obligatorio).
    var soloLetras = /^[A-Za-zÀ-ÿñÑ\s'-]{2,50}$/;
    var caracteresMensaje = /^[A-Za-zÀ-ÿñÑ0-9\s.,;:\-()¿?¡!'"@\/]+$/;
    var reglas = {
        nombre: function (v) {
            if (!soloLetras.test(v)) return "El nombre debe tener entre 2 y 50 caracteres y solo puede contener letras, espacios, guion (-) o apóstrofo (').";
            return '';
        },
        apellido: function (v) {
            if (!soloLetras.test(v)) return "El apellido debe tener entre 2 y 50 caracteres y solo puede contener letras, espacios, guion (-) o apóstrofo (').";
            return '';
        },
        email: function (v) {
            if (v.length > 30 || !/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(v)) return 'Ingresá un email válido, por ejemplo nombre@dominio.com (máximo 30 caracteres).';
            return '';
        },
        telefono: function (v) {
            if (!/^\+?[0-9\s()-]{8,20}$/.test(v)) return 'El teléfono debe tener entre 8 y 20 caracteres y solo puede contener números, espacios, + al inicio, paréntesis () y guion (-).';
            return '';
        },
        mensaje: function (v) {
            if (v.length < 10 || v.length > 2000 || !caracteresMensaje.test(v)) return 'El mensaje debe tener entre 10 y 2000 caracteres y solo puede contener letras, números y los signos . , ; : - ( ) ¿ ? ¡ ! \' " @ /';
            return '';
        }
    };

    // Muestra u oculta el error de un campo. Devuelve true si es válido.
    function mostrarError(nombre, texto) {
        var campo = formulario.elements[nombre].closest('.formulario__campo');
        campo.classList.toggle('invalido', texto !== '');
        campo.querySelector('.formulario__error').textContent = texto;
        return texto === '';
    }

    function validarCampo(nombre) {
        var valor = formulario.elements[nombre].value.trim();
        return mostrarError(nombre, reglas[nombre](valor));
    }

    // Validar cada campo al salir de él, y corregir el error mientras escribe
    Object.keys(reglas).forEach(function (nombre) {
        var campo = formulario.elements[nombre];
        campo.addEventListener('blur', function () { validarCampo(nombre); });
        campo.addEventListener('input', function () {
            if (campo.closest('.formulario__campo').classList.contains('invalido')) {
                validarCampo(nombre);
            }
        });
    });

    formulario.addEventListener('submit', function (evento) {
        evento.preventDefault(); // evitamos que la página se recargue
        resultado.textContent = '';
        resultado.className = 'formulario__resultado';

        // Validar todos los campos
        var todoOk = true;
        Object.keys(reglas).forEach(function (nombre) {
            if (!validarCampo(nombre)) todoOk = false;
        });
        if (!todoOk) return; // cada campo muestra su regla en rojo

        // Enviar los datos al controlador PHP
        botonEnviar.disabled = true;
        botonEnviar.textContent = 'Enviando...';

        fetch(formulario.action, { method: 'POST', body: new FormData(formulario) })
            .then(function (respuesta) { return respuesta.json(); })
            .then(function (datos) {
                resultado.textContent = datos.mensaje;
                if (datos.ok) {
                    resultado.classList.add('exito');
                    formulario.reset();
                } else {
                    // Errores que detectó PHP, debajo de cada campo
                    Object.keys(datos.errores || {}).forEach(function (nombre) {
                        if (formulario.elements[nombre]) mostrarError(nombre, datos.errores[nombre]);
                    });
                    resultado.classList.add('fallo');
                }
            })
            .catch(function () {
                resultado.textContent = 'No pudimos enviar el mensaje. Revisá tu conexión e intentá de nuevo.';
                resultado.classList.add('fallo');
            })
            .finally(function () {
                botonEnviar.disabled = false;
                botonEnviar.textContent = 'Enviar mensaje';
            });
    });
}
