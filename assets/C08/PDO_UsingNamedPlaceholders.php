<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

function outputUserDataset($resultset)
{
	foreach ($resultset as $row) {
	    print "<p>" . $row['username'] . " - " . $row['email'] . "</p>";
	}
}

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

// Using named placeholders
$un = "nico";
$query = "SELECT username, email FROM users WHERE username=:un";
$pdostat = $db->prepare($query);			// Prepare
$pdostat->execute(array(':un' => $un));		// Replace placeholders
$results = $pdostat->fetchAll();        	// Fetch results
outputUserDataset($results);				// Output the results
?>
