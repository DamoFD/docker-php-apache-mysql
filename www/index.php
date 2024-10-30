<?php

require 'database.php';

// Initialize variables
$connection = 'Database Not Connected';
$isConnected = false;

try {
    // Initialize new database class
    $database = new Database();
    $isConnected = $database->isDbConnected();

    // Check if database is connected
    if ($isConnected) {
        $connection = "Database Connected";
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Docker PHP Apache MySQL</title>
    </head>
    <body>
        <h1>Docker PHP Apache MySQL PHPMyAdmin</h1>
        <h2>If you can see this on your browser, your docker container is running successfully!</h2>
        <p>Here is a check to see if your database is connected:</p>

        <!-- Check if database is connected -->
        <h2 style="color: <?php echo $isConnected ? 'green' : 'red'; ?>;"><?= $connection ?></h2>
        <br />

        <!-- PHPMyAdmin -->
        <p>PHPMyAdmin will be running on <a href="http://localhost:8080/">http://localhost:8080</a>.</p>
        <p>Default credentials:</p>

        <!-- Database Credentials -->
        <ul>
            <li>Server: db</li>
            <li>Username: user</li>
            <li>Password: password</li>
        </ul>
        <br />

        <h2>Change Database Info</h2>

        <ul>
            <li>Edit the docker-compose.yml file</li>
            <li>Feel free to update the environment variables</li>
            <li>Update those changes in the Database.php file</li>
        </ul>
        <br />

        <h2>Empty out this file and/or the database file and enjoy!</h2>

    </body>
</html>
