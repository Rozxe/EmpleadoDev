### EmpleadoDev
**Prueba Tecnica - Enrique Ealo**

## Guia
para ejecutar el proyecto debes seguir los siguientes pasos en tu consola despues de hacer el pull al proyecto:

## En caso de no tener instalado Laravel
#####** En caso de no tener Laravel instalado  ejecutar la siguiente lineas de comando en consola**
- composer global require laravel/installer

## Ejecutar Servidor
#####** Seguir las siguientes indicaciones**
ejecutar en consola
- cd pruebaTecnicaEmpleado
- composer install
- cp copiar.txt .env (Este archivo es para que el proyecto no genere el nombre de la base de datos por defecto como el nombre de la carpeta sino por el indicado)

##### **En este punto por favor crear una base de datos en phpmyadmin llamada prueba_tecnica_dev esto con el fin de ejecutar las migraciones**

Posteriormente de haber creado la base de datos continuamos con la migracion de las tablas ejecutando el siguiente comando:
- php artisan migrate -\-seed (En caso de que esta linea de codigo se copie con un solo guion por favor añadir otra mas, deben ser 2 guiones antes de la palabra: seed)
- php artisan serve

####Con esto ya estaria tu proyecto de laravel ejecutando
