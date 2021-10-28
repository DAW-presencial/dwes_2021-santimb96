<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BURBUJA</title>
</head>
<body>
<?php
/**
 * declaro y defino el array con los numeros desordenados y la variable con lo que imprimira
 * @var array contiene los numeros desordenados
 * @var string contiene el mensaje a pintar en el html
 */
$numeros = array(3, 2, 1, 4, 7, 5, 6);
$arr_print = "Array propuesto: ";
/**
 * llamo a la funcion que recorrera el array de numeros y los pintara legibles en el html
 */
pintarNumeros($numeros, $arr_print);
/**
 * @param $numeros array que contiene los numeros desordenados/ordenados
 * @param $arr_print string le pasamos el mensaje para que concatene valores
 */

function pintarNumeros(array $numeros, string $arr_print)
{
    foreach ($numeros as $numero) {
        $arr_print .= $numero . ", ";
    }
    echo $arr_print . "<br>";
}

$arr_print = "Array ordenado: ";
/**
 * @var boolean contiene el estado por el cual se saldra el bucle al estar ordenado o no
 */

$ordenado = false;
/**
 * bucle que determina que solo se sale de el si el for interno ha ordenado todos los numeros
 */

while (!$ordenado) {
    /**
     * @var integer contiene el contador por el cual determinara el numero de cambios de orden
     */
    $contador = 0;
    for ($i = 0; $i < count($numeros) - 1; $i++) {

        if ($numeros[$i] > $numeros[$i + 1]) {
            /**
             * @var integer contiene numero posterior
             */
            $numPost = $numeros[$i + 1];
            $numeros[$i + 1] = $numeros[$i]; //al numero posterior le añadimos el numero previo
            $numeros[$i] = $numPost; //al numero previo le añadimos el posterior
            $contador++; //incrementamos contador indicando que por este par de posiciones se ha producido un cambio entre ellas
        }
        /**
         * si i+2 (para prevenir que entre en otra iteracion y la i se iguale a 0), es igual al tamaño del array,
         * valoramos si el contador es 0: si lo es, indicamos que esta ordenado y salimos del while; si no lo esta
         * damos otra vuelta al array hasta que no se haga ningun cambio de posicion ($contador es igual a 0)
         */
        if ($i + 2 == count($numeros)) {
            if ($contador == 0) {
                $ordenado = true;
            } else {
                $contador = 0;
            }
        }
    }
}
/**
 * llamamos a la funcion que nos imprimira los numeros pero, esta vez, ordenados tras pasar por el bucle
 */
pintarNumeros($numeros, $arr_print);

?>
</body>
</html>
