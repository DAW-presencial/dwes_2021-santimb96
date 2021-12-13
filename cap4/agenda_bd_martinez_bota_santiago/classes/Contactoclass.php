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

    /**
     * almacenamos la información en la base de datos
     * @return string
     */
    public function store(): string
    {
        $conn = $this->db;

        $sql_insert = $conn->prepare("insert into contacto(nombre, primer_apellido, segundo_apellido, tlf) values (:nombre,:apellido1, :apellido2,:tlf);");

        try {
            $sql_insert->execute([
                ':nombre' => $this->nombre,
                ':apellido1' => $this->primer_apellido,
                ':apellido2' => $this->segundo_apellido,
                ':telefono' => $this->tlf,
            ]);
            return "Contacto registrado con éxito!";
        } catch (PDOException $PDOException) {
            return "Connection error: " . $PDOException->getMessage();
        }
    }

    /**
     * mostramos todos los contactos que hay en la base de datos
     * @return string
     */
    public static function show(): string
    {

        $db = new Databaseclass();

        $conn = $db->getConection();

        $sql_select = "select nombre, primer_apellido, segundo_apellido, tlf from contacto";

        try {
            $output = "<table><tr>";
            $output .= "<th>Nombre</th><th>Primer apellido</th><th>Segundo apellido</th><th>TLF</th></tr>";
            if ($conn->query($sql_select)->fetchColumn()) {
                $result = $conn->query($sql_select);
                foreach ($result as $contacto) {
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

    /**
     * borramos el contacto que cumpla con una serie de parámetros
     * @return string
     */
    public function delete(): string
    {
        $conn = $this->db;

        $sql_del = $conn->prepare("delete from contacto where tlf=:tlf;");

        try {
            $sql_del->execute([':tlf'=>$this->tlf]);
            return "Contacto eliminado con éxito!";
        } catch (PDOException $PDOException) {
            return "Connection error: " . $PDOException->getMessage();
        }

    }

    /**
     * actualizamos el contacto que cumpla con una serie de parámetros
     * @return string
     */
    public function update(): string
    {
        $conn = $this->db;

        $sql_update = $conn->prepare("update contacto set nombre = :nombre, primer_apellido = :apellido1, 
                    segundo_apellido = :apellido2, tlf = :telefono
                    where nombre = :nombre and primer_apellido = :apellido1
                    and segundo_apellido = :apellido2 ;");

        $sql_exists = "select count(*) from contacto where nombre = '$this->nombre' and primer_apellido = '$this->primer_apellido'
                       and segundo_apellido = '$this->segundo_apellido';";

        try {
            if ($conn->query($sql_exists)->fetch()) {
                $sql_update->execute([
                    ':nombre' => $this->nombre,
                    ':apellido1' => $this->primer_apellido,
                    ':apellido2' => $this->segundo_apellido,
                    ':telefono' => $this->tlf,
                ]);
                return "Contacto actualizado con éxito!";
            } else {
                return "No existe el dato que tratas de insertar!";
            }
        } catch (PDOException $PDOException) {
            return "Connection error: " . $PDOException->getMessage();
        }

    }
}