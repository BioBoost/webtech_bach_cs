<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include('PDO_DatabaseSimple.php');
include('PDO_DatabaseSingleton_WithConfig.php');

resetWebtechDatabaseToInitialState(Database::getInstance());

?>
<div>
	<h2>Whats in the database ?</h2>
	<?php
		// Create select statement
		$query = 'SELECT username, password, email, display_name FROM users WHERE 1';
		$results = Database::getInstance()->query($query);		// Execute query
		outputUserDataset($results);
	?>
</div>