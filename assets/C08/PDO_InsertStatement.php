<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include('PDO_DatabaseSimple.php');

$db = connectToDatabase();
resetWebtechDatabaseToInitialState($db);

?>
<div>
	<h2>Before the insert</h2>
	<?php
		// Create select statement
		$query = 'SELECT username, password, email, display_name FROM users WHERE 1';
		$results = $db->query($query);		// Execute query
		outputUserDataset($results);
	?>
</div>

<div>
	<h2>Inserting ...</h2>
	<?php
	$newvalues = array( ":username" => "john",
	                	":password" => "DADADA",
	             		":email" => "john@rambo.com",
	              		":display_name" => "John Rambo");

	$insert = "INSERT INTO users (username, password, email, display_name)
	                  VALUES (:username, :password, :email, :display_name)";

	$pdostat = $db->prepare($insert);
	$success = $pdostat->execute($newvalues);
	echo $success ? "<p>Insert successfully.</p>" : "<p>Failed to insert</p>";

	// Print number of rows that were affected (should be 1)
	print "Affected rows: " . $pdostat->rowCount();
	?>
</div>

<div>
	<h2>After the insert</h2>
	<?php
		// Create select statement
		$query = 'SELECT username, password, email, display_name FROM users WHERE 1';
		$results = $db->query($query);		// Execute query
		outputUserDataset($results);
	?>
</div>