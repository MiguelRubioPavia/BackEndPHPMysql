Este proyecto es una API REST básica hecha con php sin la ayuda de frameworks.

Cosas a tener en cuenta en la configuración de esta api es la falta de un archivo de configuración en el cual se añaden
los datos sensibles para el acceso a la base de datos.

La estructura del archivo (db.const.php) es la siguiente:

```php
<?php
    define("BIB_USER", "Tu usuario de base de datos");
    define("BIB_PASS", "Tu contraseña de base de datos");
    define("BIB_BBDD", "El nombre de tu base de datos");
    define("BIB_HOST", "127.0.0.1");
?>
```
# Chikorita
![Chikorita](https://assets.pokemon.com/assets/cms2/img/pokedex/full/152.png)