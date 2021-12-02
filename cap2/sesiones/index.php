<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SESIONES</title>
</head>
<body>
<?php
session_start();

if(!isset($_SESSION["name"])){
    setcookie("name", "santi", time () + 3600);
    $_SESSION["name"] = $_COOKIE["name"];

    $mensaje = "Cookie y Sesión creadas con este nombre: ". $_SESSION["name"];

} else {
    session_destroy();
    $mensaje = "Bienvenido, ". strtoupper($_SESSION["name"]);
}

echo $mensaje;
?>
</body>
</html>
