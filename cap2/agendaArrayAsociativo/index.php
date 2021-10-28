<?php
/**
 * @author smartinez@cifpfbmoll.eu
 * @version 1.0.0
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contacts 2021/22</title>
    <style>
        /**
        Algunos estilos basicos para la agenda mediante CSS
         */
        body {
            color: white;
            background: black;
            font-family: monospace, sans-serif;
        }

        .error {
            background: darkred;
            border-radius: 20px;
            font-weight: bold;
            width: 20%;
            padding: 5px;
        }
        .button{
            background: dimgrey;
            border-radius: 10px;
            color: white;
        }
        .button:hover{
            background: grey;
        }
    </style>
</head>
<body>
<?php
/**
 * declaramos y definimos la variables que usaremos para almacenar los datos del nombre, tlf y el array de datos
 */
$name = "";
$tlf = "";
$data = [];
/**
 * mediante este if comprobamos si el usuario ha hecho submit o no; si lo ha hecho, se procesan los datos;
 * si no, se imprime un echo vacio para evitar el error de submit no definido (no existe)
 */
if (isset($_GET["submit"]) === true) {
    /**
     * @var "$name", @var $data, @var tlf:
     * para evitar error de contacto no definido tras el primer submit (el array del hidden esta vacio), asigno
     * un array temporal mediante la condicion !isset (si no existe aun $_GET["contact"])
     */
    if (!isset($_GET["contact"])) {
        $temp = [];
        $data = $temp;
    } else {
        $data = $_GET["contact"]; //cogemos todos los valores de contact[]
    }
    if ($_GET["name"][0] === "") {
        echo "<h3 class='error'>No has escrito ningún nombre!</h3>";
    } else {


        $name = $_GET["name"]; //cogemos el valor de nombre
        $tlf = $_GET["tlf"]; //cogemos el valor del telefono
        /**
         * valoramos si el tlf esta vacio para poder poder borrar así su correspiendiente contacto
         */
        if ($tlf[0] === "") {
            foreach ($data as $data_name => $data_tlf) {
                if ($name[0] === $data_name) {
                    unset($data[$data_name]);
                    break;
                }
            }
        } else {
            $data = keyValue($data, $name, $tlf);
        }
    }
} else {
    echo "";
}

?>


<h1>CONTACTS 2021/22</h1>
<form>
    NAME: <input name="name[]" type="text"/>
    TLF: <input name="tlf[]" type="text"/>
    <?php
    /**
     * se invoca a la funcion @dataInput para que retorne aqui los input con los valores persistentes
     */
    dataInput($data);
    ?>
    <input class="button" type="submit" name="submit" value="Submit!"/>
</form>
<h2>CONTACTS:</h2>


<?php

displayData($data); //invocamos a la funcion para pintar los datos en el html
/**
 * le pasamos el array de contactos para que le de un formato de lista yh lo pinte en el html
 * @param $data "data" es el array de contactos
 */
function displayData($data)
{
    $render = "<ol>";
    foreach ($data as $data_name => $data_tlf) {
        $render .= "<li>" . "NAME: " . $data_name . " TLF: " . $data_tlf . "</li>";
    }
    $render .= "</ol>";
    echo $render;
}

/**
 * esta funcion se encarga de crear inputs hidden recorriendo con foreach y almacenando los datos en name y value
 * @param $data "data" es el array que contiene todos los contactos con sus telefonos
 */
function dataInput($data)
{
    foreach ($data as $data_name => $data_tlf) {
        ?>
        <input type="hidden" name="contact[<?= $data_name ?>]" value="<?= $data_tlf ?>">
        <?php
    }
}

/**
 * asignamos name => tlf en modo clave:valor
 * @param $data "[]" le pasamos el array con los datos previos (si los tiene) para que tenga lo de antes+lo que le añadamos
 * @param $name "name" es el nombre obtenido del input
 * @param $tlf "tlf" es el telefono obtenido el inpput
 * @return mixed devolvemos $data
 */
function keyValue($data, $name, $tlf)
{
    $data[$name[0]] = $tlf[0]; //asignacion clave:valor
    return $data;
}

?>
</body>
</html>