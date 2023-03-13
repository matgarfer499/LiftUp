<p align="center">Proyecto Laravel</p>
(Antonio se que esto esta pasado de hora, pero el readme que subi ayer lo actualize en el mismo github y al subirte el .env se volvio a subir el readme que hace por defecto laravel y no me di cuenta).

La idea del proyecto se basa en una tienda de ropa con temática deportiva.
A continuación explico las pantallas que se pueden visualizar una vez hechas las migraciones y llenado la base de datos con 
los seeders(Con hacer 'php artisan migrate --seed', se llena con factories y semilleros predefinidos):

- La primera vista al entrar es la página principal que se puede visualizar la ropa de hombre.
  Esta vista usa un layout que es la barra de navegación que se encuentre en el top de la pantalla que contiene las rutas para ver las ropas de hombre y mujer, el logo de la web y botones de interacciones, los cuales el único que funciona por ahora es el de usuario.

- Si entramos en una ropa no llevara a otra vista con esa ropa en cuestion, con información sobre ella como más imagenes, colores y  tallas disponibles y reviews de los usuarios.

- Al clickar en el icono de usuario este nos llevara al login si no estamos autenticados, dentro tenemos la opcion de logearnos o crear una cuenta si no tenemos una. En los seeders hay dos predifinidas(correo, contraseña):
    * Admin : admin@liftup.es, admin. 
    * Usuario no admin: user@gmail.com, 123456. 

  Ahora dependiendo de si un usuario es admin o no ocurre lo siguiente:

    * Usuario no admin: Este una vez logueado sera llevado de nuevo a la página principal, este si vuelve a darle al icono de usuario sera llevado a un dashboard, con sus datos y con una barra lateral con las rutas de poder cerrar sesión y configuración con las opciones por defecto de Laravel para editar un usuario. Ademas este si intenta acceder a una ruta admin no tendra permisos y le dara un error 403 | Forbidden

    * Admin: Cuando inicia sesión este es llevado a una ruta distinta solo para admins en el que tiene el control para poder crear nuevas ropas, editarlas y borrarlas. Como se podra ver tambien hay una barra lateral para elegir entre el CRUD de ropas y otro para poder eliminar o insertar imagenes a las ropas. Si clica en el logo este sera llevado a la página principal y por si desea ver cambios. Además si un usuario es admin le aparecera un boton arriba a la izquierda para volver a los CRUDs y realizar cambios.

Cada vista y layaout ha sido creada en blade.
