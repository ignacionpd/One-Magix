# MEMORY.md — One Magix
Memoria del proyecto. Máximo ~50 líneas: resume o elimina lo que ya no aporte.

## Estado actual
- v1 publicada en InfinityFree (subdominio gratuito). Cada push a `main` despliega solo (GitHub Actions).
- Listos: carrusel, flyers, video, crédito "Diseñado por" en el footer y hora de Argentina.
- Falta cargar los datos reales de `controllers/smtp_config.php` (se sube a mano al servidor). Hasta entonces el formulario no envía correos.

## Decisiones (y por qué)
- Los cambios van por rama y pull request: nada se publica hasta que Ignacio mergea a `main`, porque el merge publica.
- `smtp_config.php` queda fuera de Git y del despliegue: son datos sensibles.
- Carrusel propio, sin librería, para controlar el formato 4:5 y la transparencia de las vecinas.
- Video vertical 9:16 con autoplay en silencio: el navegador no permite autoplay con sonido.
- Crédito del footer solo con el ícono iP en blanco (SVG): el logo largo no se lee a 17 px. Hay una skill: `credito-disenado-por`.
- SEO en dos etapas: hoy el sitio está en un subdominio gratuito y recién con dominio propio se puede posicionar.
- Textos visibles (título de pestaña y `<h1>`) no se tocan por SEO. La metadescripción dice "San Miguel", no "Argentina".
- Se usa una Constitution liviana y un spec por tarea grande; sin más trámite para no frenar el flujo.

## Aprendizajes y errores a evitar
- Animar al hacer scroll con IntersectionObserver, no con GSAP ScrollTrigger (fallaba al redimensionar).
- La sesión en la nube no puede escribir `.github/` en el equipo de Ignacio: va por pull request.
- `CLAUDE.md`, `MEMORY.md`, `Constitution.md` y `specs/` no se suben al servidor (excluidos en el workflow).

## Próximos pasos
- SEO (detalle y listas de control en `specs/seo/spec.md`):
  - Etapa 1, subdominio gratuito: pendiente de hacer.
  - Etapa 2, al contratar el dominio: PENDIENTE. Cuando Ignacio avise que ya tiene dominio, abrir el spec y recorrer la etapa 2.
- Plantilla de repositorio para webs nuevas con despliegue a InfinityFree: borrador listo, falta crear el repositorio en GitHub (Ignacio lo va a recordar).
