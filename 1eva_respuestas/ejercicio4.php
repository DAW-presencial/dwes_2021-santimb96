<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
</head>
<body>
<?php


/**
 * creamos clase escuderia
 */
class Escuderia
{
    // creamoos atributo protected para favorecer la herencia
    private $marca;

    /**
     * @param $marca
     */
    public function __construct($marca)
    {
        $this->marca = $marca;
    }

    public function __set($property, $value)
    {

        $this->$property = $value;

    }

    public function __get($property)
    {

        return $this->$property;

    }
}

/**
 * creamos clase Piloto que extiende de Escudería y por tanto heredará la marca de esta
 */
class Piloto extends Escuderia
{
    public $nombre;

    /**
     * creamos el constructor y añadimos la propiedad del padre $marca
     * @param $nombre
     */
    public function __construct($marca, $nombre)
    {
        $this->nombre = $nombre;
        parent::__construct($marca);
    }
}

$escuderia = new Escuderia('alpine');
$escuderia->color='azul';

/**
 * imprimimos la propiedad que exsite y la que hemos establecido
 */
echo "<h2>Clase Escudería</h2><br>";
echo "Marca: " . $escuderia->marca . "<br>"; //obtenemos marca
echo "Color: " . $escuderia->color . "<br>"; //color establecido

$piloto = new Piloto('ferrari', 'carlos sainz');

$piloto->numero_piloto= 55;

//$piloto->__set('numero_piloto', 55);

echo "<h2>Clase Piloto</h2><br>";
echo "Marca: " . $piloto->marca . "<br>"; //obtenemos marca del hijo
echo "Piloto: " . $piloto->nombre . "<br>"; //obtenemos nombre piloto
echo "Número: " . $piloto->numero_piloto . "<br>"; //obtenemos numero piloto
?>
</body>
</html>
