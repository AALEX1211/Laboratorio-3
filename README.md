# Laboratorio #3: Sistema de Admisión de Aspirantes

Este proyecto consiste en el desarrollo de una aplicación web modular para el registro y gestión de aspirantes universitarios. Ha sido construido utilizando **PHP**, **HTML5**, **CSS3** y **Bootstrap 5.3**, siguiendo las buenas prácticas de desarrollo web, seguridad y maquetación semántica.

---

## Descripción del Proyecto

El sistema permite capturar la información personal y la fotografía de un aspirante a través de un formulario web. En el backend, el sistema aplica técnicas de saneamiento de datos, formateo de texto, cálculo dinámico de edad y subida segura de archivos en el servidor local sin hacer uso de bases de datos.

---

## Estructura del Proyecto

```text
Taller-Aspirantes/
├── includes/
│   ├── header.php          # Cabecera semántica, Metadatos, Navbar y Breadcrumbs dinámicos
│   └── footer.php          # Pie de página modular con año dinámico y enlaces
├── uploaded_files/
│   ├── .htaccess           # Archivo de seguridad para denegar ejecución de scripts
│   └── .gitkeep            # Mantiene el directorio en control de versiones
├── index.php               # Página principal con el formulario de registro
├── procesar.php            # Script backend de validación, procesado y despliegue
└── README.md               # Documentación general del proyecto
