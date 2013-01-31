<?php
	
	$bd = new SQLite3('brains.db');
	
	$origen = $_POST["origen"];
	$destino = $_POST["destino"];
	$fecha = $_POST["fecha"];
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
	echo exec("./db.py");
?>