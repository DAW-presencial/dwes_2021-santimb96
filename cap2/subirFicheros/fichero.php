<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FICHERO</title>
</head>
<body>
<?php

if (isset($_POST['submit'])) {

    $contador_errores = 0;
    $arr_errores = [];

    $directorio = 'fichero/';

    try {
        for ($i = 0; $i < count($_FILES); $i++) {

            if ($_FILES['file' . $i]['error'] === UPLOAD_ERR_OK) {
                move_uploaded_file($_FILES['file' . $i]['tmp_name'], $directorio . $_FILES['file' . $i]['name']);
            } else {
                ++$contador_errores;
                $arr_errores[] = $_FILES['file' . $i]['error'];
            }

        }

    } catch (Exception $exception) {
        echo $exception;
    }

    if ($contador_errores === 0) {
        echo "Se han subido y movido los ficheros con éxito!";
    } else {
        echo "Se han producido " . $contador_errores . " errores";
        var_dump($arr_errores);
    }
} else {
    echo "Hay algún tipo de error con el SUBMIT";
}
?>
</body>
</html>
