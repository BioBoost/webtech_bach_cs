<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include('PDO_DatabaseSimple.php');

$db = connectToDatabase();
resetWebtechDatabaseToInitialState($db);

?>
<div>
	<h2>Before the delete</h2>
	<?php
		// Create select statement
		$query = 'SELECT username, password, email, display_name FROM users WHERE 1';
		$results = $db->query($query);		// Execute query
		outputUserDataset($results);
	?>
</div>

<div>
	<h2>Deleting ...</h2>
	<?php
	$un = "nicdw";
	$delete = "DELETE FROM users WHERE username=:username";

	$pdostat = $db->prepare($delete);
	$success = $pdostat->execute(array(':username' => $un));

	echo $success ? "<p>Delete successfully.</p>" : "<p>Failed to delete</p>";

	// Print number of rows that were affected (should be 1)
	print "Affected rows: " . $pdostat->rowCount();
	?>
</div>

<div>
	<h2>After the delete</h2>
	<?php
		// Create select statement
		$query = 'SELECT username, password, email, display_name FROM users WHERE 1';
		$results = $db->query($query);		// Execute query
		outputUserDataset($results);
	?>
</div>