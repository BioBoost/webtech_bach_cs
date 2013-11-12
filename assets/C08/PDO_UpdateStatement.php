<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include('PDO_DatabaseSimple.php');

$db = connectToDatabase();
resetWebtechDatabaseToInitialState($db);

?>
<div>
	<h2>Before the update</h2>
	<?php
		// Create select statement
		$query = 'SELECT username, password, email, display_name FROM users WHERE 1';
		$results = $db->query($query);		// Execute query
		outputUserDataset($results);
	?>
</div>

<div>
	<h2>Updating ...</h2>
	<?php
	$newvalues = array( ":username" => "nicodw",
	                    ":email" => "mynew_email2@donaim.com");

	$update = "UPDATE users SET email=:email WHERE username=:username";

	$pdostat = $db->prepare($update);
	$success = $pdostat->execute($newvalues);

	echo $success ? "<p>Update successfully.</p>" : "<p>Failed to update</p>";

	// Print number of rows that were affected (should be 1)
	print "Affected rows: " . $pdostat->rowCount();
	?>
</div>

<div>
	<h2>After the update</h2>
	<?php
		// Create select statement
		$query = 'SELECT username, password, email, display_name FROM users WHERE 1';
		$results = $db->query($query);		// Execute query
		outputUserDataset($results);
	?>
</div>