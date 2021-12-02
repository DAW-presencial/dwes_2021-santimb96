<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD INDEX</title>
</head>
<body>
<div>

    <form action="index.php" method="post">

        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre">

        <label for="primer_apellido">Primer apellido</label>
        <input type="text" id="primer_apellido" name="primer_apellido">

        <label for="segundo_apellido">Segundo apellido</label>
        <input type="text" id="segundo_apellido" name="segundo_apellido">

        <label for="tlf">Teléfono</label>
        <input type="text" id="tlf" name="tlf">

        <input type="submit" name="registrar" value="Registrar">
        <input type="submit" name="mostrar" value="Mostrar">
        <input type="submit" name="actualizar" value="Actualizar">
        <input type="submit" name="borrar" value="Borrar">

    </form>

</div>
<?php
include_once('classes/Contactoclass.php');
include_once('db/Databaseclass.php');

$db = new Databaseclass();


if (isset($_POST['nombre']) && isset($_POST['primer_apellido']) && isset($_POST['segundo_apellido']) && $_POST['tlf']) {

    $nombre = $_POST['nombre'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $tlf = $_POST['tlf'];

    $contacto = new Contactoclass($nombre, $primer_apellido, $segundo_apellido, $tlf, $db->getConection());

    if (isset($_POST['registrar'])) {

        echo $contacto->store();
    }

    else if (isset($_POST['actualizar'])) {

        echo $contacto->update();

    } else if (isset($_POST['borrar'])) {

       echo $contacto->delete();

    }
}

if (isset($_POST['mostrar'])) {

    echo Contactoclass::show();
}


?>
</body>
</html>
