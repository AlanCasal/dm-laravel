![](/public/img/DMLogo.png)

# Dragon Market

_2018 - Proyecto Integrador para **Digital House**_ 🎓

_Aplicación web que simula un e-commerce de productos de computación.
Tiene base de datos con **MySQL**, un carrito de compras, un **usuario Admin** y peticiones **Ajax**._


### Nota 📝
_Esta es una versión que rehice terminado el curso de fullstack en Digital House y **no está completamente funcional
porque no está terminada**. Al poco tiempo de comenzar a rehacerla conseguí mi primer trabajo
y opté por abandonar el proyecto para seguir estudiando sobre proyectos del trabajo
en mis tiempos libres._

_De todas formas se puede apreciar el uso de **HTML**, **CSS**, **Laravel**, **MySQL**, y **jQuery**._


### Pre-requisitos 📋

* [Composer](https://getcomposer.org/)
* [Node](https://nodejs.org/)
* [Xampp](https://www.apachefriends.org/es/index.html)
* PHP (Incluído en la instalación de Xampp)


### Instalación 🔧

```
git clone https://github.com/AlanCasal/dm-laravel.git
```
``cd dm-laravel`` para entrar al directorio del proyecto.

Instalar los paquetes necesarios con:
```
composer install
```
```
npm install
```
Copiar el archivo ``.env.example`` y borrarle el ``.example``

![](/screenshots/env.jpg)

Generar una key para el archivo ``.env`` con el siguiente comando:
```
php artisan key:generate
```
![](/screenshots/generate-key.jpg)

Abrir **Xampp**, e iniciar los modulos **Apache** y **MySQL**
![](/screenshots/xmapp.jpg)

Clickear en el botón **Admin** de **MySQL** para ingresar a **PhpMyAdmin**
![](/screenshots/xampp-admin.jpg)

Dentro de la solapa de **Databases**, crear una base de datos con nombre **laravel**
![](/screenshots/phpmyadmin.jpg)


Insertar el contenido prearmado a la base de datos ejecutando migración y seeders con el siguiente comando:
```
php artisan migrate:fresh --seed
```

## Uso - Localhost 💻

Una vez instalado, se puede correr el proyecto con el comando
```
php artisan serve
```
Se puede ver el proyecto ingresado a ``localhost:8000`` desde cualquier browser

* ### ¡Aviso!
_¡Como se mencionó al inicio, la aplicación no está terminada!_


## Hecho con 🛠️

* [Laravel](https://laravel.com/)
* [MySQL](https://www.mysql.com/)
* [jQuery](https://jquery.com/)


## Autor ✒️

| ![](https://avatars3.githubusercontent.com/u/38706801?s=400&u=2554a57319d104165c02c733cb1a4dc39db7be85&v=4) 
| -
| [Alan Casal](https://github.com/AlanCasal)
| Desarrollador javascript full stack

[![LinkedIn](https://cloud.githubusercontent.com/assets/17016297/18839848/0fc7e74e-83d2-11e6-8c6a-277fc9d6e067.png)][1]

[1]: https://www.linkedin.com/in/alancasal
