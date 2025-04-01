# repo-mvc

Proyecto CRUD en MVC

Descripción general

Este proyecto implementa las cuatro operaciones básicas de un CRUD:
✅ Crear
✅ Leer
✅ Actualizar
✅ Eliminar

Utiliza la arquitectura Modelo-Vista-Controlador (MVC) para separar la lógica de negocio, la presentación y el control de flujo.

La aplicación muestra un listado de productos almacenados en una base de datos y permite administrar registros mediante una interfaz gráfica web.



Contenido



Introducción

Una petición URL (Uniform Resource Locator) es una cadena estructurada que permite identificar, localizar y recuperar recursos alojados en un servidor web. En este proyecto, la gestión de URLs se realiza mediante reglas de enrutamiento definidas en archivos de configuración ocultos (.htaccess) ubicados en las carpetas raíz, public, y app.

El diagrama de carpetas de la aplicación CRUD en MVC presenta tres niveles de ejecución:

Raíz de la aplicación: Contiene el archivo principal de configuración y el redireccionamiento hacia la carpeta public.

Capa pública (public/): Almacena los recursos accesibles para el cliente, incluyendo archivos CSS, JavaScript e imágenes.

Capa de aplicación (app/): Contiene la lógica del servidor mediante controladores, modelos y vistas.



Configuración del enrutamiento

El sistema de enrutamiento está basado en archivos .htaccess, los cuales permiten reescribir URLs para gestionar las solicitudes de manera dinámica.

Configuración en la raíz:

RewriteEngine On
RewriteRule ^$ public/index.php [L]
RewriteRule (.*) public/$1 [L]

Esta configuración redirige todas las peticiones hacia public/index.php, asegurando que la aplicación tenga un punto de entrada único.

Configuración en public:

RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.+)$ index.php?url=$1 [QSA,L]

Esta configuración captura las peticiones y las redirige al controlador principal a través de la variable url.



Controlador principal

El patrón Front Controller gestiona todas las solicitudes entrantes, asegurando que sean direccionadas al controlador correspondiente.

El archivo public/index.php tiene la responsabilidad de cargar en memoria la estructura del sistema e instanciar el ControladorPrincipal:

require_once("../app/libs/ControladorPrincipal.php");
$controladorPrincipal = new ControladorPrincipal();

El ControladorPrincipal desglosa la URL en tres componentes:

Controlador: Define la lógica de la petición.

Método: Especifica la acción a ejecutar.

Parámetros: Datos adicionales enviados en la URL.



Estructura del proyecto

La organización de carpetas sigue una estructura modular para garantizar mantenibilidad y escalabilidad:

´´´
/MVC
 ├── .htaccess         # Configuración para enrutamiento
 ├── public            # Archivos accesibles desde el navegador
 │      ├── css        # Hojas de estilo
 │      ├── img        # Recursos visuales
 │      ├── js         # Scripts de interactividad
 │      ├── index.php  # Punto de entrada de la aplicación
 ├── app               # Lógica del servidor
 │      ├── controladores   # Lógica de negocio (PHP)
 │      ├── modelos         # Consultas a la base de datos
 │      ├── vistas          # Renderización de la interfaz
 │      ├── libs            # Clases auxiliares
 │      ├── inicio.php      # Carga el controlador principal
 └── composer.json     # Dependencias del proyecto
´´´


Referencias

GitHub Docs. (s.f). Basic writing and formatting syntax. Recuperado de: https://docs.github.com/en/get-started/writing-on-github/getting-started-with-writing-and-formatting-on-github/basic-writing-and-formatting-syntax

Portal Andino. Guía de Markdown. Recuperado de: https://datosgobar.github.io/portal-andino/markdown-guide/

Alvarez, O. D. G., Larrea, N. P. L., & Valencia, M. V. R. (2022). Análisis comparativo de Patrones de Diseño de Software. Polo del Conocimiento: Revista científico-profesional, 7(7), 2146-2165. Recuperado de: https://dialnet.unirioja.es/descarga/articulo/9042927.pdf