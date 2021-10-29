<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
</head>
<body>
<?php

function cargarClase($nombre_clase){
    include $nombre_clase.".php";
}

spl_autoload_register("cargarClase");

$retorno = new Retorno();

$retorno->setter = [6, 9];
echo $retorno->setter;

?>
</body>
</html>
