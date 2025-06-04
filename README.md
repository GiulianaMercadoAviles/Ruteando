# Ruteando

Ruteando es un sistema integral de gestión de maquinaria vial desarrollado con Laravel, diseñado para optimizar la administración de activos, obras y mantenimientos. Permite una supervisión eficiente de todo el ciclo de vida de la maquinaria pesada en proyectos viales.


## Funcionalidades principales

- Administrar el parque de maquinaria: Permite mantener un registro detallado de cada máquina, incluyendo su estado, modelo, marca, y kilometraje. Podrás registrar nuevas máquinas, editar su información existente y darlas de baja cuando sea necesario.
- Gestión de obras viales: Facilita el registro, edición y finalización de obras viales, llevando un control centralizado de los proyectos.
- Asignación de maquinaria: Ofrece la capacidad de asignar máquinas específicas a obras en curso, optimizando su utilización. El sistema también genera reportes mensuales de las asignaciones para un mejor seguimiento.
- Registro de mantenimiento: Permite llevar un historial completo de mantenimientos preventivos y correctivos. El sistema también puede comunicar cuándo una máquina necesita un mantenimiento, facilitando la programación de futuras intervenciones.


## Características

- Gestión de Maquinaria:
    Creación, edición y eliminación de registros de máquinas.
    Detalles completos por máquina (modelo, marca, año, estado, etc.).
- Gestión de Obras Viales:
    Creación y seguimiento de proyectos viales.
    Información detallada de cada obra (nombre, ubicación, fechas, estado).
- Asignación Flexible:
    Asignación de una o varias máquinas a obras específicas.
    Visualización de la disponibilidad de maquinaria.
    Generación de reportes mensuales de asignaciones.
- Historial de Mantenimiento:
    Registro de mantenimientos realizados (fecha, tipo, descripción).
    Funcionalidad para comunicar la necesidad de mantenimiento.
- Autenticación de Usuarios:
    Sistema de login/registro para administradores y/o usuarios.
    Control de acceso a las distintas funcionalidades.


## Tecnologías Utilizadas

- Backend: Laravel (PHP Framework)
- Base de Datos: MySQL
- Frontend: Blade Templates (Laravel)
- Lenguajes: PHP, HTML, CSS, JavaScript
- Gestor de Paquetes PHP: Composer


## Requisitos

- PHP >= 8.1
- Composer
- MySQL o MariaDB
- Node.js y npm (opcional, para assets)
- [Laravel 12.x](https://laravel.com/)


## Instalación

1. **Clona el repositorio:**
   ```bash
   git clone https://github.com/GiulianaMercadoAviles/Ruteando.git
   cd maquinariavial
   
2. **Instala dependencias de PHP:**
    ```bash
   composer install
   
3. **Copia el archivo de entorno y configura tus variables:**
   Copia el archivo .env.example a .env:
   ```bash
   cp .env.example .env

4. **Generar la clave de la aplicación:**
    ```bash
   php artisan key:generate

5. **Configurar la base de datos:**
    Abre el archivo .env y configura tus credenciales de base de datos:

    DB_CONNECTION=mysql      # el gestor de base de datos que vayas a utilizar
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=ruteando_db  # O el nombre que prefieras para tu base de datos
    DB_USERNAME=root         # Tu usuario de MySQL
    DB_PASSWORD=             # Tu contraseña de MySQL

6. **Ejecuta las migraciones:**
    ```bash
    php artisan migrate

   Si quieres usar datos de prueba usa:
    ```bash
   php artisan migrate --seed

7. **Instalar dependencias de NPM y compilar assets (si aplica):**
   npm install
    npm run dev      # Para desarrollo
    npm run build    # Para producción

7. **Inicia el servidor de desarrollo:**
    ```bash
   php artisan serve

9. **Accede a la aplicación:**
   Ve a http://localhost:8000 en tu navegador.

## Uso
Una vez que la aplicación esté corriendo, podrás interactuar con las diferentes secciones de Ruteando:

1. Inicio de Sesión/Registro: Accede a la plataforma a través de la página principal. Si es tu primera vez, puedes registrar un nuevo usuario o utilizar las credenciales de prueba si se generaron con los seeders:
Email: admintest@gmail.com
Contraseña: 12345678

3. Gestión de Maquinaria: Utiliza la sección dedicada para añadir nuevas máquinas al parque, actualizar su información (estado, kilometraje) o darlas de baja cuando ya no estén en uso.

4. Gestión de Obras: En la sección de obras, podrás registrar nuevos proyectos viales, definir sus fechas de inicio y fin, y marcar su estado (en curso, finalizada).

5. Asignación de Máquinas a Obras: Desde la vista de una obra o una máquina específica, podrás realizar asignaciones, indicando la duración de la asignación. El sistema te ayudará a visualizar la disponibilidad de la maquinaria.

6. Historial y Comunicación de Mantenimiento: Registra los mantenimientos realizados para cada máquina. El sistema te alertará o permitirá comunicar cuando una máquina requiera una revisión, facilitando la gestión de mantenimiento preventivo y correctivo.


## Créditos

Desarrollado por Giuliana Magali Mercado Aviles


## Contacto 
Si tienes alguna pregunta, sugerencia o deseas ponerte en contacto, puedes escribirme a:
Email: giulianamercado43@gmail.com
