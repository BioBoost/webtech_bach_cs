<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Data Source Name
$dsn = "mysql:host=localhost;port=3306;dbname=nico_webtech_pdo";
$username = "nico_webtech_pdo";
$password = "QwX5NQHm2Hwp2daQ";

try
{
    // Create a PHP Data Object
    $db = new PDO($dsn, $username, $password);
	echo "<p>Connection was succesfully made with the database.</p>";
}
catch (PDOException $e)
{
    echo 'Connection failed: ' . $e->getMessage();
    exit();
}

?>