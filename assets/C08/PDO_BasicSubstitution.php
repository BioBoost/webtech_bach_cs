<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Data Source Name
$dsn = "mysql:host=localhost;port=3306;dbname=nico_webtech_pdo";
$username = "nico_webtech_pdo";
$password = "QwX5NQHm2Hwp2daQ";

// try
// {
//     // Create a PHP Data Object
//     $db = new PDO($dsn, $username, $password);
//     echo "Connection was succesfully made with the database";
// }
// catch (PDOException $e)
// {
//     echo 'Connection failed: ' . $e->getMessage();
//     exit();
// }

$db = new PDO($dsn, $username, $password);
//...

// Create select statement
$un = "nico";
$query = "SELECT username, email FROM users WHERE username='$un'";
$results = $db->query($query);      // Execute query

// Output the results
foreach ($results as $row) {
    print "<p>" . $row['username'] . " - " . $row['email'] . "</p>";
}


?>
