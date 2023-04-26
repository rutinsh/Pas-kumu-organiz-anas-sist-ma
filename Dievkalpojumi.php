<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Dievkalpojumi</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		th {
			background-color: #ddd;
		}
	</style>
</head>
<body>
	<h1>Dievkalpojumi</h1>
	<?php
	$mysqli = new mysqli('localhost', 'root', '', 'apvieniba');

	if ($mysqli->connect_errno) {
		echo 'Failed to connect to database: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
	} else {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST['action'])) {
                // Check if the form was submitted to create a new entry
                if ($_POST['action'] === 'create') {
                    $date = $_POST['date'];
                    $time = $_POST['time'];
                    $description = $_POST['description'];
        
			// Check if the form was submitted to create a new entry
			if ($_POST['action'] === 'create') {
				$date = $_POST['date'];
				$time = $_POST['time'];
				$description = $_POST['description'];
				$room_id = $_POST['room_id'];
				$result = $mysqli->query("INSERT INTO dievkalpojumi (Datums, Laiks, Apraksts, ZaleID) VALUES ('$date', '$time', '$description', $room_id)");
				if (!$result) {
					echo 'Error creating entry: ' . $mysqli->error;
				}
			}
    }
}
        }
    }

			// Check if the form was submitted to edit an existing entry
			if (isset($_POST['action']) && $_POST['action'] === 'edit') {
				$id = $_POST['id'];
				$date = $_POST['date'];
				$time = $_POST['time'];
				$description = $_POST['description'];
				$room_id = $_POST['room_id'];
				$result = $mysqli->query("UPDATE dievkalpojumi SET Datums='$date', Laiks='$time', Apraksts='$description', ZaleID=$room_id WHERE DievkalpojumaID=$id");
				if (!$result) {
					echo 'Error updating entry: ' . $mysqli->error;
				}
			}

			// Check if the form was submitted to delete an existing entry
            if (isset($_POST['action']) && $_POST['action'] === 'delete') {
                $id = $_POST['id'];
                $result = $mysqli->query("DELETE FROM dievkalpojumi WHERE DievkalpojumaID=$id");
                if (!$result) {
                    echo 'Error deleting entry: ' . $mysqli->error;
                }
            }
            

		// Display entries in HTML table
		$result = $mysqli->query('SELECT * FROM dievkalpojumi');
		if ($result->num_rows > 0) {
			echo '<table>';
			echo '<tr><th>ID</th><th>Date</th><th>Time</th><th>Description</th><th>Room ID</th><th>Actions</th></tr>';
			while ($row = $result->fetch_assoc()) {
				echo '<tr>';
				echo '<td>' . $row['DievkalpojumaID'] . '</td>';
				echo '<td>' . $row['Datums'] . '</td>';
				echo '<td>' . $row['Laiks'] . '</td>';
				echo '<td>' . $row['Apraksts']. '</td>';
                echo '<td>' . $row['ZaleID'] . '</td>';
                			// Add edit and delete buttons
			echo '<td>';
			echo '<form method="post" action="edit_dievkalpojums.php">';
			echo '<input type="hidden" name="id" value="' . $row['DievkalpojumaID'] . '">';
			echo '<input type="submit" name="edit" value="Edit">';
			echo '</form>';
			echo '<form method="post" action="delete_dievkalpojums.php">';
			echo '<input type="hidden" name="id" value="' . $row['DievkalpojumaID'] . '">';
			echo '<input type="submit" name="delete" value="Delete">';
			echo '</form>';
			echo '</td>';

			echo '</tr>';
		}
		echo '</table>';
	} else {
		echo 'No entries found.';
	}

	// Close the database connection
	$mysqli->close();
	?>

</body>
</html>