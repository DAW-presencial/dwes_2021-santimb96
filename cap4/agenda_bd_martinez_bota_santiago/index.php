<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD INDEX</title>
    <style>
        *{
            font-family: monospace, sans-serif;
            background: black;
            color: white;
        }
        .form {
            display: flex;
            align-items: center;
            flex-direction: column;
            padding: 5% 5%;
            align-content: center;
            gap: 2vh;
            font-weight: bold;
            font-size: 3vh;
        }
        .titulo-agenda {
            text-align: center;
        }

        .div {
            border: 2px white solid;
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

        input {
            background: white;
            color: black;
            transition: 0.3s;
        }

        input:hover{
            background: black;
            color: white;
        }

    </style>
</head>
<body>
<div class="div">

    <h1 class="titulo-agenda">AGENDA BASE DE DATOS</h1>

    <form class="form" action="helper.php" method="post">

        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre">

        <label for="primer_apellido">Primer apellido</label>
        <input type="text" id="primer_apellido" name="primer_apellido">

        <label for="segundo_apellido">Segundo apellido</label>
        <input type="text" id="segundo_apellido" name="segundo_apellido">

        <label for="tlf">Teléfono</label>
        <input type="text" id="tlf" name="tlf">

        <input class="boton" type="submit" name="registrar" value="Registrar">
        <input class="boton" type="submit" name="mostrar" value="Mostrar">
        <input class="boton" type="submit" name="actualizar" value="Actualizar">
        <input class="boton" type="submit" name="borrar" value="Borrar">

    </form>

</div>
</body>
</html>
