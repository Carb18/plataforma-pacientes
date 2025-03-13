<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Prueba tecnica plataforma de pacientes.
![image](https://github.com/user-attachments/assets/f73796f3-48ac-400b-a46f-2321e653aaae)


### Se manejó laravel para el desarrollo del CRUD.
#### Para el entornor de trabajo y poner en marcha el proyecto se utilizó XAMPP y MySQL. El nombre de la base de datos por defecto es plataforma.

EL orden de ejecución es el siguiente;

1. Instalar XAMPP, Laravel, Composer y tener NodeJS instalado para hacer uso de NPM.
2. Crear la base de datos desde phpMyAdmin usando la sentencia SQL create database plataforma, la cual será la base de datos a utilizar. En el archivo .env, por defecto esta la configuración para establecer
la conexión con la base de datos, tanto el nombre de la bd, usuario y contraseña.
3. Clonar el repositorio.
4. Ejecutar las migraciones usando la interfaz de linea de comandos artisan. Utilizaremos php artisan migrate.
5. Luego ejecutaremos los seeders previamente establecidos mediante php artisan db:seed
6. Para el entorno de manejo de login se utilizó el starter kit Breeze.
7. Una vez ejecutadas las migraciones y seeders e instalar las dependencias. Podemos poner en marcha la aplicación.
8. Para no tener problemas con el CSS se ejecuta npm run dev y posteriormente en otra pestaña de la terminal php artisan serve.
9. Una vez en ejecución todo lo necesario se tendrá acceso al CRUD con el manejo de los pacientes, tanto editarlos, listarlos, eliminarlos.
10. El usuario administrador por defecto es admin@example.com y contraseña: 1234567890
11. Se manejó la estructura establecida en el documento recibido para la elaboración de la prueba. Se usaron las relaciones correspondientes a las tablas asi como los datos de prueba previamente establecidos en los seeders.


