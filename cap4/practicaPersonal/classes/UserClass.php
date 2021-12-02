<?php

class UserClass
{
    //private $id;
    private $userName;
    private $password;
    private $db;

    /**
     * @param $id
     * @param $userName
     * @param $password
     */
    public function __construct($userName, $password, $db)
    {
        //$this->id = $id;
        $this->userName = $userName;
        $this->password = $password;
        $this->db = $db;
    }

    public function store(): string
    {
        $conn = $this->db;

        $sql_insert = "insert into user(id, userName, password) values ('$this->userName','$this->password');";

        try {
            $conn->query($sql_insert);
            return "Usuario registrado con éxito!";
        } catch (PDOException $PDOException) {
            return "Connection error: " . $PDOException->getMessage();
        }
    }

    public function show(): string
    {
        $conn = $this->db;

        $sql_select = "select userName from user where password = '$this->password' and userName = '$this->userName';";

        try {
            if($conn->query($sql_select)->fetchColumn()){
                $result = $conn->query($sql_select)->fetchColumn();
                return "Bienvenid@, ".$result;
            } else {
                return "Login incorrecto!";
            }
        } catch (PDOException $PDOException) {
            return "Connection error: " . $PDOException->getMessage();
        }
    }
}