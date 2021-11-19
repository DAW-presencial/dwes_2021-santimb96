<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FORMULARIO SUBIR FICHEROS</title>
</head>
<body>

<form method="post" action="fichero.php" enctype="multipart/form-data">

    FICHERO : <input type="file" name="file0"  placeholder="fichero"/>
    FICHERO 2: <input type="file" name="file1"  placeholder="fichero"/>
    FICHERO 3: <input type="file" name="file2"  placeholder="fichero"/>

    <input type="submit" name="submit" value="send!">

</form>

</body>
</html>
