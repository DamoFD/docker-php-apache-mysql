<?php

class Database
{
    private string $servername = "db";
    private string $username = "root";
    private string $password = "password";
    //uncomment me private string $dbname = "your database name";
    public object $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password); //comment/remove
        //uncomment me $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            throw new Exception("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function isDbConnected(): bool
    {
        return $this->conn->ping();
    }
}
