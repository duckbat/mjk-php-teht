<?php
// dbConnect.php

// Include configuration variables
require __DIR__ . '/../config/config.php';

// Construct DSN string including port
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8;port=$port";

try {
    // Create a PDO instance to establish a database connection
    $DBH = new PDO($dsn, $username, $password);

    // Set PDO error mode to throw exceptions
    $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Display an error message and log the exception
    echo "Could not connect to database: " . $e->getMessage();
    file_put_contents('PDOErrors.txt', 'dbConnect.php - ' . $e->getMessage(), FILE_APPEND);
}
?>
