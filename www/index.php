<?php

require 'database.php';

$connection = 'Database Not Connected';
$isConnected = false;

try {
    $database = new Database();
    $isConnected = $database->isDbConnected();

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

        <h2 style="color: <?php echo $isConnected ? 'green' : 'red'; ?>;"><?= $connection ?></h2>
        <br />

        <p>PHPMyAdmin will be running on <a href="http://localhost:8080/">http://localhost:8080</a>.</p>
        <p>Default credentials:</p>

        <ul>
            <li>Server: db</li>
            <li>Username: root</li>
            <li>Password: password</li>
        </ul>
        <br />

        <h2>Add your Database</h2>

        <ul>
            <li>After making your database, uncomment the <code>$dbname</code> from the database.php file and input the name of your database.</li>
            <li>Comment/Remove the old <code>new mysqli()</code></li>
            <li>Uncomment the new <code>new mysqli()</code></li>
        </ul>
        <br />

        <h2>Empty out this file and/or the database file and enjoy!</h2>

    </body>
</html>
