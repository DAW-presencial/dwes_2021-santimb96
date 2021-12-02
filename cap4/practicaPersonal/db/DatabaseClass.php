<?php

class DatabaseClass
{
    private const HOST = "localhost";
    private const DBNAME = "userdb";
    private const USERNAME = "root";
    private const PASSWORD = "";

    public function __construct(){
    }

    public function getConection(): PDO|string
    {
        try {
            $conn = new PDO("mysql:host=" . self::HOST . ";dbname=" . self::DBNAME, self::USERNAME, self::PASSWORD);

        } catch (PDOException $exception) {
            return "Connection error: " . $exception->getMessage();
        }
        return $conn;
    }
}