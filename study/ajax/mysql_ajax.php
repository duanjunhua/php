<?php
	
	$name = isset($_GET["name"]) ? $_GET["name"] : "";

	if(empty(trim($name))){
		echo "Please select one website";
		exit;
	}


	$servername = "localhost";
	$username = "root";
	$password = "root";

	$conn = mysqli_connect($servername, $username, $password);
	if(!$conn){
		die("Could not connect: " . mysqli_error());
	}

	//select database
	mysqli_select_db($conn, "test");
	//set code
	mysqli_set_charset($conn, "utf8");

	$sql = "select * from WebSites where name = '" . $name . "'";

	$result = mysqli_query($conn, $sql);

	echo "<table border='1'>
			<tr>
				<th>ID</th>
				<th>WebName</th>
				<th>WebSite</th>
			</tr>";

	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td>" . $row["id"] . "</td>";
		echo "<td>" . $row["name"] . "</td>";
		echo "<td>" . $row["url"] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
	mysqli_close($conn);
?>