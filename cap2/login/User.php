<?php

class User
{
    private $name;
    private $password;

    public function __construct($name, $password)
    {
        $this->name = $name;
        $this->password = $password;

    }

    public function toDatabase(): string
    {
        $host = "localhost";
        $db_name = "userdb";

        $username = "root";
        $password = "";

        try {
            $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);

            $sql_select = "select userName, password from user where password = '$this->password'";

            if($conn->query($sql_select)->fetchColumn()){
                return "loggeado!";
            } else {
                return "error!";
            }


        } catch (PDOException $exception) {
            return "Connection error: " . $exception->getMessage();
        }

    }
}