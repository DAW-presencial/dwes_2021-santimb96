<?php

class Databaseclass
{
    private $host = "51.178.152.213";
    private $dbname = "smartinez_agenda_db";
    private $username = "smartinez_usr";
    private $password = "abc123.";
    private $puerto = "5432";

    public function __construct(){
    }

    public function getConection(): PDO|string
    {
        try {
            $conn = new PDO("pgsql:host=".$this->host.";port=".$this->puerto.";dbname=".$this->dbname, $this->username, $this->password);
        } catch (PDOException $exception) {
            return "Connection error: " . $exception->getMessage();
        }
        return $conn;
    }
}