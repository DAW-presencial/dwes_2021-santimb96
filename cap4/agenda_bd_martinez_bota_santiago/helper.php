<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD INDEX</title>
    <style>
        body {
            font-family: monospace, sans-serif;
            background: black;
            color: white;
        }

        table {
            margin-top: 10vh;
            display: flex;
            justify-content: center;
            align-self: center;
            color: white;
        }

        th, td {
            border: 2px white solid;
            border-collapse: collapse;
            padding: 2vh;
        }

        .centrar {
            display: flex;
            justify-content: center;
            align-self: center;
            margin-top: 2vh;
        }

        .boton {
            background: grey;
            color: black;
            border-radius: 5px;
            border: 2px solid white;
            width: 20vh;
            height: 5vh;
            font-weight: bold;
            transition: 0.3s;
        }

        .boton:hover {
            color: white;
            background: black;
        }
    </style>
</head>
<body>
<?php
/**
 * importamos clase de contcatos y de base de datos
 */
include_once ('db/Databaseclass.php');
include_once ('classes/Contactoclass.php');


$db = new Databaseclass();

/**
 * comprobamos que los campos han sido posteados
 */

if (isset($_POST['nombre']) && isset($_POST['primer_apellido']) && isset($_POST['segundo_apellido']) && $_POST['tlf']) {

    $nombre = trim(filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING));
    $primer_apellido = trim(filter_input(INPUT_POST, 'primer_apellido', FILTER_SANITIZE_STRING));
    $segundo_apellido = trim(filter_input(INPUT_POST, 'segundo_apellido', FILTER_SANITIZE_STRING));
    $tlf = trim($_POST['tlf']);

    $contacto = new Contactoclass($nombre, $primer_apellido, $segundo_apellido, $tlf, $db->getConection());

    /**
     * a la hora de regsitrar miramos si el número es igual a 9 para realizar registro
     */
    if (isset($_POST['registrar'])) {
        if(strlen($tlf) != 9){
            echo "Formato de número no correcto!";
        } else {
            echo $contacto->store();
        }

    } else if (isset($_POST['actualizar'])) {
        echo $contacto->update();

    } else if (isset($_POST['borrar'])) {
        echo $contacto->delete();
    }
}
/**
 * para mostrar los datos lo hacemos mediante singleton y referencia método estático
 */
if (isset($_POST['mostrar'])) {
    echo Contactoclass::show();
}
?>
<div class="centrar">
    <button onclick="location.href = 'index.php'" class="boton">Atrás!</button>
</div>

</body>
</html>


