<?php

function connectToDatabase()
{
	// Data Source Name
	$dsn = "mysql:host=localhost;port=3306;dbname=nico_webtech_pdo";
	$username = "nico_webtech_pdo";
	$password = "QwX5NQHm2Hwp2daQ";

	$db = null;
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

	return $db;
}

function resetWebtechDatabaseToInitialState($db)
{
	$delete = "DELETE FROM users WHERE id >= 0";
	$pdostat = $db->prepare($delete);
	$success = $pdostat->execute();

	if ($success)
	{
		$records = array(
			array(
					":username" => "nicodw",
                    ":password" => "rXlCjt5wXCuAqnYJ00s1",
                    ":email" => "nico.dewitte@kuleuven.be",
                    ":display_name" => "Nico De Witte"
			),
			array(
					":username" => "mark",
                    ":password" => "rXldfsCjt5wXCuAdsqnYsdfJ00dfs1",
                    ":email" => "mark.devlu@kuleuven.be",
                    ":display_name" => "Mark De Vlu"
			),
			array(
					":username" => "sarahtb",
                    ":password" => "rX1lsCwXCu12AdsqnY30df",
                    ":email" => "sarah.tebo@kuleuven.be",
                    ":display_name" => "Sarah Tebo"
			)
		);

		$insert = "INSERT INTO users (username, password, email, display_name)
		                  VALUES (:username, :password, :email, :display_name)";

		$pdostat = $db->prepare($insert);

		$success = true;
		foreach ($records as $newvalues)
		{
			$success = $success && $pdostat->execute($newvalues);
		}

		if ($success)
		{
			echo "<p>Database reset to initial state.</p>";
		}
		else
		{
			echo "<p>Could not reset database to initial state.</p>";
		}
	}
	else
	{
		echo "<p>Could not reset database to initial state.</p>";
	}
}

function outputUserDataset($resultset)
{
	echo '<table>';
	echo '<thead>';
		echo '<tr>';
			echo '<th>' . 'Display Name' . '</th>';
			echo '<th>' . 'Username' . '</th>';
			echo '<th>' . 'E-Mail' . '</th>';
			echo '<th>' . 'Password' . '</th>';
		echo '</tr>';
	echo '</thead>';
	echo '<tbody>';
	foreach ($resultset as $row) {
		echo '<tr>';
			echo '<td>' . $row['display_name'] . '</td>';
			echo '<td>' . $row['username'] . '</td>';
			echo '<td>' . $row['email'] . '</td>';
			echo '<td>' . $row['password'] . '</td>';
		echo '</tr>';
	}
	echo '</tbody>';
	echo '</table>';
}

?>