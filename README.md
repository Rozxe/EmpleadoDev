# EmpleadoDev
Prueba Tecnica - Enrique Ealo

para ejecutar el proyecto debes seguir los siguientes pasos en tu consola despues de hacer el pull al proyecto:

** En caso de no tene laravel instalado ** <br>
 Ejecutar la siguiente linea de comando: <br>
 composer global require laravel/installer <br>
** En caso de no tene laravel instalado ** <br>

** Pasos a seguir para ejecutar el servidor de laravel ** <br>
cd pruebaTecnicaEmpleado <br>
composer install <br>
cp copiar.txt .env <br>
php artisan key:generate <br>

Llegado a este punto este punto por favor crear una base de datos en phpmyadmin llamada "prueba_tecnica_dev" esto con el fin de ejecutar las migraciones<br>
Posteriormente de haber creado la base de datos ejecutar los siguientes comandos:<br>

php artisan migrate --seed <br>
php artisan serve <br>
