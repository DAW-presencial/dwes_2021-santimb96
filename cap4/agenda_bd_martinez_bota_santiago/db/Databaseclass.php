<?php

class Databaseclass
{
    private const HOST = "localhost";
    private const DBNAME = "smartinez_agenda_db";
    private const USERNAME = "smartinez_usr";
    private const PASSWORD = "abc123.";

    public function __construct(){
    }

    public function getConection(): PDO|string
    {
        try {
            $conn = new PDO("pgsql:host=" . self::HOST . ";dbname=" . self::DBNAME, self::USERNAME, self::PASSWORD);
        } catch (PDOException $exception) {
            return "Connection error: " . $exception->getMessage();
        }
        return $conn;
    }
}