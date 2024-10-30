<?php

declare(strict_types=1);

/**
* Database class creates and checks the database connection
*
* @since 1.0
*/
class Database
{
    /**
    * The database host name
    *
    * @var string
    *
    * @since 1.0
    */
    private string $servername = "db";

    /**
    * The database username
    *
    * @var string
    *
    * @since 1.0
    */
    private string $username = "user";

    /**
    * The database password
    *
    * @var string
    *
    * @since 1.0
    */
    private string $password = "password";

    /**
    * The database name
    *
    * @var string
    *
    * @since 1.0
    */
    private string $dbname = "test";

    /**
    * The database connection object
    *
    * @var mysqli
    *
    * @since 1.0
    */
    public mysqli $conn;

    /**
    * Database constructor
    *
    * @throws Exception
    *
    * @since 1.0
    */
    public function __construct()
    {
        // Create database connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection errors
        if ($this->conn->connect_error) {
            throw new Exception("Connection failed: " . $this->conn->connect_error);
        }
    }

    /**
    * Checks if database is connected
    *
    * @return bool
    *
    * @since 1.0
    */
    public function isDbConnected(): bool
    {
        // Ping the database
        return $this->conn->ping();
    }
}
