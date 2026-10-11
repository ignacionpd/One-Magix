/* ==========================================================
   One Magix - Animaciones (GSAP + Vanta.js + efecto de scroll propio)
   Las librerías se cargan por CDN desde views/layout/footer.php.
   Si alguna librería no carga, la web sigue funcionando igual.
   ========================================================== */

document.addEventListener('DOMContentLoaded', function () {
    // Respetamos a quien tiene activada la opción "reducir movimiento"
    var reducirMovimiento = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (reducirMovimiento) return;

    iniciarFondoAnimado();
    animarAlHacerScroll();
    if (window.gsap) animarPortada();
});

/* ---------- Fondo animado de la portada ----------
   Efectos disponibles:
     'red'        -> red de puntos dorados (Vanta NET)
     'ondas'      -> ondas doradas en 3D (Vanta WAVES)
     'niebla'     -> humo dorado en movimiento (Vanta FOG)
     'destellos'  -> polvo de luz dorado flotando (tsParticles)
   Para cambiar el efecto fijo, modificá EFECTO_PORTADA.
   Para probar uno sin editar nada, agregá a la dirección ?efecto=ondas
   (por ejemplo http://localhost/PROYECTOS/One%20Magix/?efecto=niebla) */
var EFECTO_PORTADA = 'red';

var LIBRERIAS_EFECTO = {
    ondas: 'https://cdn.jsdelivr.net/npm/vanta@0.5.24/dist/vanta.waves.min.js',
    niebla: 'https://cdn.jsdelivr.net/npm/vanta@0.5.24/dist/vanta.fog.min.js',
    destellos: 'https://cdn.jsdelivr.net/npm/tsparticles-slim@2.12.0/tsparticles.slim.bundle.min.js'
};

// Carga un script solo cuando hace falta
function cargarScript(url, alTerminar) {
    var script = document.createElement('script');
    script.src = url;
    script.onload = alTerminar;
    document.head.appendChild(script);
}

function iniciarFondoAnimado() {
    var elegido = new URLSearchParams(window.location.search).get('efecto') || EFECTO_PORTADA;

    if (elegido === 'red') {
        efectoRed();
    } else if (LIBRERIAS_EFECTO[elegido]) {
        var dibujar = { ondas: efectoOndas, niebla: efectoNiebla, destellos: efectoDestellos }[elegido];
        cargarScript(LIBRERIAS_EFECTO[elegido], dibujar);
    }
}

// Opciones comunes de Vanta
function opcionesVanta(extra) {
    return Object.assign({
        el: '#fondoAnimado',
        mouseControls: true,
        touchControls: true,
        gyroControls: false,
        minHeight: 200,
        minWidth: 200,
        scale: 1.0,
        scaleMobile: 1.0
    }, extra);
}

function efectoRed() {
    if (!window.VANTA || !VANTA.NET) return;
    VANTA.NET(opcionesVanta({
        color: 0xd4af37,
        backgroundColor: 0x000000,
        points: 9,
        maxDistance: 22,
        spacing: 18
    }));
}

function efectoOndas() {
    if (!window.VANTA || !VANTA.WAVES) return;
    VANTA.WAVES(opcionesVanta({
        color: 0x2b2108,
        shininess: 40,
        waveHeight: 18,
        waveSpeed: 0.7,
        zoom: 0.85
    }));
}

function efectoNiebla() {
    if (!window.VANTA || !VANTA.FOG) return;
    VANTA.FOG(opcionesVanta({
        highlightColor: 0xd4af37,
        midtoneColor: 0x4a3a0a,
        lowlightColor: 0x000000,
        baseColor: 0x000000,
        blurFactor: 0.6,
        speed: 1.2,
        zoom: 0.9
    }));
}

function efectoDestellos() {
    if (!window.tsParticles) return;
    tsParticles.load('fondoAnimado', {
        fullScreen: { enable: false },
        background: { color: '#000000' },
        fpsLimit: 60,
        particles: {
            number: { value: 80, density: { enable: true, area: 900 } },
            color: { value: ['#d4af37', '#f0d77b', '#ffffff'] },
            opacity: { value: { min: 0.2, max: 0.9 }, animation: { enable: true, speed: 0.8, sync: false } },
            size: { value: { min: 1, max: 3.5 } },
            move: { enable: true, direction: 'top', speed: 0.6, outModes: { default: 'out' } }
        },
        interactivity: {
            events: { onHover: { enable: true, mode: 'repulse' } },
            modes: { repulse: { distance: 90 } }
        },
        detectRetina: true
    });
}

/* ---------- Entrada del texto de la portada ---------- */
function animarPortada() {
    gsap.from('.inicio__contenido > *', {
        y: 40,
        opacity: 0,
        duration: 1,
        stagger: 0.2,
        ease: 'power3.out',
        delay: 0.2
    });
}

/* ---------- Aparición al hacer scroll ----------
   Cada elemento con el atributo data-animar:
   - aparece (fade + movimiento) cuando entra en pantalla,
   - se queda visible mientras esté a la vista,
   - se desvanece con el mismo efecto al irse de pantalla (por ejemplo al subir),
   - y vuelve a aparecer cada vez que regresás a esa parte de la página.
   Variantes: data-animar (sube), data-animar="izquierda", data-animar="derecha".
   El estado se calcula siempre según dónde está el elemento en ese momento,
   así que no se rompe al cambiar el tamaño de la ventana.
   Los estilos del efecto están en assets/css/estilos.css (clase .visible). */
function animarAlHacerScroll() {
    // Si el navegador no soporta IntersectionObserver, todo queda visible
    if (!('IntersectionObserver' in window)) return;

    var elementos = document.querySelectorAll('[data-animar]');
    if (!elementos.length) return;

    // Esta clase activa el estado inicial oculto (ver estilos.css)
    document.documentElement.classList.add('animar-scroll');

    var observador = new IntersectionObserver(function (entradas) {
        entradas.forEach(function (entrada) {
            entrada.target.classList.toggle('visible', entrada.isIntersecting);
        });
    }, {
        rootMargin: '0px 0px -15% 0px', // aparece un poco antes de llegar al borde de abajo
        threshold: 0
    });

    elementos.forEach(function (elemento) { observador.observe(elemento); });
}
