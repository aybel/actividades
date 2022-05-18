Despliegue de la aplicación

# CodeIgniter 4 Framework
PHP version 7.3 o superior
Mysql 5.7 
Apache 2.4

Modrewrite activado

//Stack de desarrollo Laragon Full 5.0

1.- Copiar la carpeta actividades en la carpeta www o htdocs (dependiendo del servidor)
2.- Correr el script de base de datos actividades.sql en Mysql
3.- Abrir navegador y colocar la siguiente direccion:

http://127.0.0.1/actividades/public
o
http://localhos/actividades/public

Por defecto las credenciales para conexión a base de datos son:

username: root
password: ""

en caso de usar otro usuario, editar el archivo
actividades/app/Config/Database.php
Cambiar las lineas 36 y 37 con las nuevas credenciales.