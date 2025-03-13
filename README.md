# production_management

# Programas y versiones para instalar este proyecto

Para desarrollar este proyecto primero instalar PHP, se baja de la página y 
tenés que guardar el .zip, observando la versión que se especifica al final del
presente documento, agregar al Path la variable de entorno del PHP y luego
chequear que se haya instalado bien en cmd o Powershell.
Luego instalar Composer, si tenés antivirus desactivale las protecciones que
corren todo el tiempo, pueden romper las bolas (y si directamente desinstalás el
antivirus te hacés un favor). Chequear en cmd que se haya instalado.
Luego instalar git.
Luego clonar el repositorio localmente y por último abrí una terminal en la base
del proyecto y corré el comando "composer install" sin comillas, este comando
instala todas las librerías necesarias para el proyecto que se encuentren en el
archivo composer.json.
Por último, para ver que esté todo piola corré el comando "php artisan serve" y
debería levantarte la aplicación, la cuál podés abrirla con 
"localhost:8080".

# Versiones

# Postgresql
psql (PostgreSQL) 17.4

# PHP (Instalar en primer lugar)
PHP 8.3.19 (cli) (built: Mar 12 2025 14:01:49) (NTS Visual C++ 2019 x64)
Copyright (c) The PHP Group
Zend Engine v4.3.19, Copyright (c) Zend Technologies

# Composer (Instalar una vez instalado PHP)
Composer version 2.8.6 2025-02-25 13:03:50

# Laravel
"laravel/framework": "^12.0"
