<?php

class Database
{
    private $host;
    private $dbname;
    private $user;
    private $password;
    private $conn;

    public function __construct()
    {
        include_once 'config.php';
        $this->host = DB_HOST;
        $this->dbname = DB_NAME;
        $this->user = DB_USER;
        $this->password = DB_PASSWORD;

        $this->connect();
    }

    private function connect()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }
}
