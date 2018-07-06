<?php
$hostname = '';
$database = '';
$username = ''; // Permission limited to SELECT of tables
$password = '';

try {
    // Creating PDO object for connection for the database
    $pdo = new PDO('mysql:host=' . $hostname . ';dbname=' . $database, $username, $password);
} catch (Exception $e) {
    die("Could not connect to the database. Contact the site admin");
}
?>