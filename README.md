Este proyecto es una API REST básica hecha con php sin la ayuda de frameworks.

### Peticiones de la api
#### GET
* Obtener todos los usuarios
http://localhost/BackEndPHPMysql/api/usuario_route.php

* Obtener un usuario
http://localhost/BackEndPHPMysql/api/usuario_route.php/1

#### POST
* Añadir un usuario (Hace falta un json)
http://localhost/BackEndPHPMysql/api/usuario_route.php

#### PUT
* Modificar un usuario (Hace falta un json)
http://localhost/BackEndPHPMysql/api/usuario_route.php

#### DELETE
* Eliminar un usuario
http://localhost/BackEndPHPMysql/api/usuario_route.php/1

Cosas a tener en cuenta en la configuración de esta api es la falta de un archivo de configuración en el cual se añaden
los datos sensibles para el acceso a la base de datos y la base de datos esta solo tiene una tabla con dos columnas id y nombre.

La estructura del archivo (db.const.php) es la siguiente:

```php
<?php
    define("BIB_USER", "Tu usuario de base de datos");
    define("BIB_PASS", "Tu contraseña de base de datos");
    define("BIB_BBDD", "El nombre de tu base de datos");
    define("BIB_HOST", "127.0.0.1");
?>
```
El proyecto aun le faltan cosas a mejorar, una de las pendientes son las URL amigables
Una ruta actual es la siguiente:
http://localhost/BackEndPHPMysql/api/usuario_route.php

La ruta objetivo a lograr:
http://localhost/BackEndPHPMysql/api/usuario

# Chikorita
![Chikorita](https://assets.pokemon.com/assets/cms2/img/pokedex/full/152.png)
