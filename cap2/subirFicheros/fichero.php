<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FICHERO</title>
</head>
<body>
<?php

if (isset($_POST['submit'])) {

    if ($_FILES['file0']['error'] === UPLOAD_ERR_OK && $_FILES['file1']['error'] === UPLOAD_ERR_OK) {

        var_dump($_FILES);

        $directorio = 'fichero/';

        try {
            for ($i = 0; $i < count($_FILES); $i++) {
                move_uploaded_file($_FILES['file' . $i]['tmp_name'], $directorio . $_FILES['file' . $i]['name']);
            }

        } catch (Exception $exception) {
            echo $exception;
        }

        echo 'enviado!';
    } else {

        echo "Hay algún tipo de error";
    }
}
?>
</body>
</html>
