<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	include 'dbConfig.php';
	$sql = "SELECT * FROM crud";
	$result = $db->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
?>	
		<tr>
			<td><?=$row['name'];?></td>
			<td><?=$row['email'];?></td>
			<td><?=$row['phone'];?></td>
			<td><?=$row['city'];?></td>
		</tr>
<?php	
	}
	}
	else {
		echo "0 results";
	}
	mysqli_close($conn);
?>
  