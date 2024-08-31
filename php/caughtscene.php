<?php
try {
    //create a PDO instance for db connection
    $conn = new PDO("mysql:host=localhost; dbname=caughtscene", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
