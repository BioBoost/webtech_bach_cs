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
		$records = array(
			array(
					":username" => "jenny",
	                ":password" => "dfgdfgdfg44tret6ewr",
	                ":email" => "jenny@domain.com",
	                ":display_name" => "Jenny The Merx"
			),
			array(
					":username" => "donny",
	                ":password" => "sdfsdfsdsdfrtutytytyry",
	                ":email" => "donny@domain.com",
	                ":display_name" => "Donny English"
			),
			array(
					":username" => "marry",
	                ":password" => "sdfsdfsdtyttyyutty",
	                ":email" => "marry@domain.com",
	                ":display_name" => "Marry Tebo"
			)
		);

		$insert = "INSERT INTO users (username, password, email, display_name)
		                  VALUES (:username, :password, :email, :display_name)";

		$pdostat = $db->prepare($insert);

		$success = true;
		foreach ($records as $newvalues) {
			$success = $success && $pdostat->execute($newvalues);
		}

		echo $success ? "<p>Insert successfully.</p>" : "<p>Failed to insert</p>";
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