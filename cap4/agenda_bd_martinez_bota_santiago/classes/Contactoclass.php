<?php

class Contactoclass
{
    //private $id;
    private $nombre;
    private $primer_apellido;
    private $segundo_apellido;
    private $tlf;
    private $db;

    /**
     * @param $nombre
     * @param $primer_apellido
     * @param $segundo_apellido
     * @param $tlf
     * @param $db
     */
    public function __construct($nombre, $primer_apellido, $segundo_apellido, $tlf, $db)
    {
        $this->nombre = $nombre;
        $this->primer_apellido = $primer_apellido;
        $this->segundo_apellido = $segundo_apellido;
        $this->tlf = $tlf;
        $this->db = $db;
    }

    public function store(): string
    {
        $conn = $this->db;

        $sql_insert = "insert into contacto(nombre, primer_apellido, segundo_apellido, tlf) values ('$this->nombre','$this->primer_apellido', '$this->segundo_apellido','$this->tlf');";

        try {
            $conn->exec($sql_insert);
            return "Contacto registrado con éxito!";
        } catch (PDOException $PDOException) {
            return "Connection error: " . $PDOException->getMessage();
        }
    }

    public static function show(): string
    {

        $db = new Databaseclass();

        $conn = $db->getConection();

        $sql_select = "select * from contacto";

        try {
            $output = "<table border='solid'><tr>";
            $output .= "<th>Nombre</th><th>Primer apellido</th><th>Segundo apellido</th><th>TLF</th></tr>";
            if($conn->query($sql_select)->fetchColumn()){
                $result = $conn->query($sql_select);
                foreach ($result as $contacto){
                    //$resultado_query.= $contacto['nombre'].', '.$contacto['primer_apellido']. ', '.$contacto['segundo_apellido']. ', '.$contacto['tlf'];
                    $output .= "<tr>";
                    $output .= '<th>' . $contacto['nombre'] . '</th>';
                    $output .= '<th>' . $contacto['primer_apellido'] . '</th>';
                    $output .= '<th>' . $contacto['segundo_apellido'] . '</th>';
                    $output .= '<th>' . $contacto['tlf'] . '</th>';
                    $output .= "</tr>";
                }
                $output .= "</table>";
            }
            return $output;

        } catch (PDOException $PDOException) {
            return "Connection error: " . $PDOException->getMessage();
        }
    }

    public function delete(): string
    {
        $conn = $this->db;

        $sql_del = "delete from contacto where tlf='$this->tlf';";

        try {
            $conn->exec($sql_del);
            return "Contacto eliminado con éxito!";
        } catch (PDOException $PDOException) {
            return "Connection error: " . $PDOException->getMessage();
        }

    }

    public function update(){
        $conn = $this->db;

        $sql_update = "update contacto set nombre = '$this->nombre', primer_apellido = '$this->primer_apellido', 
                    segundo_apellido = '$this->segundo_apellido', tlf='$this->tlf' where tlf='$this->tlf';";

        try {
            $conn->exec($sql_update);
            return "Contacto actualizado con éxito!";
        } catch (PDOException $PDOException) {
            return "Connection error: " . $PDOException->getMessage();
        }

    }
}