# Spec SEO — One Magix
Guía general en `guia-seo.md` (fuera del repositorio). Dos etapas; se marca cada casilla al terminarla.

**Regla de avance:** no se empieza una etapa hasta que todas las casillas de la etapa actual estén marcadas.

**Fuera de alcance:** el título de la pestaña y el `<h1>` visible no se modifican. No se agregan palabras clave a textos visibles sin aprobación de Ignacio.

## Etapa 1 — Subdominio gratuito (estado: pendiente)
Objetivo: dejar el sitio técnicamente listo sin que Google indexe el subdominio.
- [x] Metadescripción con "San Miguel" en lugar de "Argentina" (`SITIO_DESCRIPCION`).
- [ ] `config/config.php`: `SITIO_URL`, interruptor `INDEXABLE` (false por ahora) y datos del negocio.
- [ ] `header.php`: `robots` según el interruptor (`noindex` si es false), `canonical`, Open Graph, Twitter Card y `lang="es-AR"`.
- [ ] `alt` real en las 10 imágenes de galería y flyers; `loading="lazy"` fuera de la pantalla inicial.
- [ ] JSON-LD `LocalBusiness` o `EventVenue` y `FAQPage`.
- [ ] `robots.txt` y `sitemap.xml` (con la URL tomada de `SITIO_URL`).
- [ ] Probar en móvil, tablet y escritorio; validar con Rich Results Test.
Terminada cuando: todo marcado, sin errores, mergeado y publicado.

## Etapa 2 — Dominio propio (estado: PENDIENTE hasta tener dominio)
Se activa cuando Ignacio avise que contrató el dominio. Hace falta: el dominio y las zonas a cubrir.
- [ ] `SITIO_URL` con el dominio nuevo e `INDEXABLE` en true.
- [ ] `.htaccess`: redirección a HTTPS y a una sola versión (con o sin `www`).
- [ ] Revisar `canonical`, sitemap y JSON-LD con el dominio nuevo.
- [ ] Search Console (verificar y enviar sitemap), Bing Webmaster y Analytics.
- [ ] Google Business Profile y Bing Places; pedir reseñas.
- [ ] Medir velocidad (PageSpeed) y optimizar imágenes y fondo animado en móvil.
- [ ] Evaluar páginas por servicio (cambio grande: consultar antes).
Terminada cuando: dominio indexado y fichas de Google verificadas.
