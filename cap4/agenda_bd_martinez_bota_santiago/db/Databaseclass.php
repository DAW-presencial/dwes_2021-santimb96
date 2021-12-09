<?php

class Databaseclass
{
    private $host = "localhost";
    private $dbname = "smartinez_agenda_db";
    private $username = "smartinez_usr";
    private $password = "abc123.";

    public function __construct(){
    }
//
    public function getConection(): PDO|string
    {
        try {
            $conn = new PDO("pgsql:host=".$this->host.";dbname=".$this->dbname, $this->username, $this->password);
        } catch (PDOException $exception) {
            return "Connection error: " . $exception->getMessage();
        }
        return $conn;
    }
}