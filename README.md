# Proyecto: Landing Page - Dr. Salvador Ángel García

Este proyecto consiste en el desarrollo de una Landing Page de gran atractivo visual ("Clean Beauty Minimalista"), enfocada a pacientes de Cirugía Plástica Estética y Reconstructiva. La interfaz ha sido diseñada cuidando especialmente la experiencia de usuario (UX/UI), utilizando tipografías premiums, imágenes de alta calidad e interacciones sutiles pero impactantes.

## Tecnologías Utilizadas

*   **HTML5 & CSS3:** Estructuración semántica y estilos modernos.
*   **Bootstrap 5:** Framework CSS para un layout rápido, responsivo y ordenado.
*   **JavaScript (ES6):** Para lógica de UI y configuración de librerías de terceros.
*   **Lenis:** Scroll suave y fluido para mejorar la sensación premium ("smooth scrolling").
*   **GSAP (GreenSock Animation Platform):** Animaciones de alto rendimiento (fade-ins en cascada, efectos en scroll).
*   **ScrollTrigger (de GSAP):** Ejecución de animaciones basadas en la posición del scroll.
*   **Swiper.js:** Para el carrusel táctil e interactivo de los testimoniales.
*   **Fuentes de Google:** *Cormorant Garamond* (Serif elegante para títulos) e *Inter* (Sans-serif limpia para lectura).

## Estructura de Secciones

El sitio (`index.html`) está compuesto de forma modular:

1.  **Header (Navegación):** Menú fijo minimalista con navegación suave por anclas.
2.  **Hero Section:** Primera impresión con una imagen de fondo de alta resolución, efecto *fade-up* y promesa de valor.
3.  **Perfil del Doctor:** Breve presentación y credenciales del Dr. Salvador Ángel García.
4.  **Procedimientos (Acordeón):** Sección interactiva y horizontal. Destaca 5 áreas clave utilizando imágenes locales:
    *   *Aumento de Busto* (`images/aumentodebusto.png`)
    *   *Liposucción* (`images/liposuccion.png`)
    *   *Rinoplastia* (`images/rinoplastia.png`)
    *   *Abdominoplastia* (`images/abdinoplastia.png`)
    *   *Bichectomía* (`images/bichectomia.png`)
5.  **Aumento de Busto (Específico):** Layout de dos columnas (imagen + texto) con estilos elegantes.
6.  **Procedimientos no quirúrgicos [NUEVO]:** Layout *Split* (Texto Izquierda, Imagen Derecha) añadiendo la lista de servicios no invasivos y enlace a una segunda futura página detallada. Empleando la misma estética visual del proyecto.
7.  **CTA Intermedio:** Un bloque llamativo a pantalla ancha para agendar citas.
8.  **Testimoniales:** Uso avanzado de `Swiper.js` y disposición a dos columnas (imagen representativa + carrusel de texto).
9.  **Contacto:** Formulario estilizado para captura de 'leads'.

## Características Visuales (`css/style.css`)

El enfoque de diseño (`Clean Beauty`) está liderado por las siguientes directrices:

*   Uso de colores sutiles y neutrales: Blanco (`#ffffff`), `off-white` (`#fcfcfc`), junto con oscuros opacos sin llegar a ser 100% negro en textos (`#222` o `#111`).
*   Imágenes tratadas con `object-fit: cover` para mantener proporciones en grillas asimétricas (ej: 4/5 para retratos fotográficos).
*   Se limitó la personalización excesiva de clases por uso extensivo de utilidades de Bootstrap, pero sumando clases como `text-uppercase` y `tracking-wide` (espaciado entre letras).
*   Manejo cuidadoso del `overflow` y control de los efectos en "scroll" al redimensionar la ventana para garantizar que funcionen perfectos en Desktop y Móvil.

## Historial de Modificaciones Clave

*   **Implementación de librerías JS:** Configuración de inicialización tardía (`DOMContentLoaded`) asegurando que los scripts se integren sin interrupciones visuales en el DOM.
*   **Sección Procedimientos no quirúrgicos:** Inserción limpia dentro de la arquitectura actual.
*   **Limpieza de imágenes Placeholder:** Adaptación del acordeón principal para sustituir URLs genéricas de `Unsplash` con archivos estáticos (`/images/.png`).

## Instalación y Ejecución

Al ser un sitio web estático tradicional, no cuenta con un proceso de "build" complejo por ahora.

1.  Asegúrate de tener un servidor local configurado para despachar HTML/CSS estático si quieres evitar problemas con la carga de rutas (Puedes usar `Live Server` en VS Code).
2.  Abre el archivo `/index.html` en tu navegador para previsualizar.
