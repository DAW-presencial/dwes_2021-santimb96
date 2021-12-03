<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>__set__get</title>
</head>
<body>
<?php
class Padre {
    private $nombre;

    public function __set ($name, $value){
        $this->nombre = $value;
    }

    public function __get ($property){
        return $this->nombre;
    }
}

class Hijo extends Padre{
    public function __construct(){}
}

$padre = new Padre();
$padre->setter = "Luis";
echo $padre->getter."<br>";

$hijo = new Hijo();
$hijo->setter_hijo = "Santi";
echo $hijo->getter_hijo."<br>";
?>
</body>
</html>
