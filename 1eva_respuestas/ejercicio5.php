<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EJERCICIO 5</title>
</head>
<body>


<form action="ejercicio5.php" method="post" enctype="multipart/form-data">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre">

    <label for="apellidos">Apellidos:</label>
    <input type="text" id="apellidos" name="apellidos">

    <label for="fecha">Fecha:</label>
    <input type="date" id="fecha" name="fecha">

    <label for="file0">Fichero 1:</label>
    <input type="file" name="file0"  id="file0" placeholder="fichero"/>

    <label for="file1">Fichero 2:</label>
    <input type="file" name="file1"  id="file1" placeholder="fichero"/>

    <input type="submit" name="submit" value="Enviar!">
</form>

<?php

if(isset($_POST['submit'])){
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $apellidos = filter_input(INPUT_POST, 'apellidos', FILTER_SANITIZE_STRING);
    $fecha = $_POST['fecha'];


    $directorio = 'ficheros/';

    try {
        for ($i = 0; $i < count($_FILES); $i++) {

            if ($_FILES['file' . $i]['error'] === UPLOAD_ERR_OK) {
                move_uploaded_file($_FILES['file' . $i]['tmp_name'], $directorio . $_FILES['file' . $i]['name']);
            } else {
                echo "Se ha producido un error al subir!";
            }

        }

    } catch (Exception $exception) {
        echo $exception;
    }

    echo "<table border='solid'><tr><td>$nombre</td><td>$apellidos</td><td>$fecha</td>
    <td>".$_FILES['file0']['name']."</td><td>".$_FILES['file0']['size']."</td>
    <td>".$_FILES['file1']['name']."</td><td>".$_FILES['file1']['size']."</td></tr></table>";

}
?>
</body>
</html>
