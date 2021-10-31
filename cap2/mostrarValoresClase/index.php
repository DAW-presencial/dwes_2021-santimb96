<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
</head>
<body>
<?php
/**
 * @param $nombre_clase string parametro que recibe el nombre de la clase
 */
function cargarClase($nombre_clase)
{
    /**
     * buscamos en el mismo directorio fichero con nombre del param
     */
    include $nombre_clase . ".php";
}

/**
 * registro del autoload (PHP 8.0)
 */
spl_autoload_register("cargarClase");

/**
 * instancia de la clase
 */

$retorno = new Retorno();

/**
 * disparador del __set()
 */

$retorno->setter = [6, 9];

/**
 * disparador del get
 */

echo $retorno->setter;

?>
</body>
</html>
