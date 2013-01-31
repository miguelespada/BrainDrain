<?php
	
	$bd = new SQLite3('brains.db');
	
	$origen = $_POST["origen"];
	$destino = $_POST["destino"];
	$lonO = $_POST["lonO"];
	$latO = $_POST["latO"];
	$lonD = $_POST["lonD"];
	$latD = $_POST["latD"];
	$month = $_POST["month"];
	$year = $_POST["year"];
	$profesion = $_POST["profesion"];
	$mensaje = $_POST["mensaje"];

	$ip=$_SERVER['REMOTE_ADDR']; 
	echo '[PHP] IP:'.$ip;

	$query = "INSERT INTO Brains VALUES ('$ip', '$origen', '$destino', '$fecha', '$profesion', '$mensaje')";
	
	$results = $bd->exec($query);
	if($results)
		echo "<br> [SQLite] One row inserted";
	else
		echo "<br> [SQLite] Something wrong happend";

	// Updating JSON script
	echo "<br> [PYTHON] ";
	echo exec("./generarJSON.py");
?>