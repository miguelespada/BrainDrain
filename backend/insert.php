Hello, insertion test in sqlite.
<?php
	$bd = new SQLite3('brains.db');
	
	$origen = $_POST["origen"];
	$destino = $_POST["destino"];
	$fecha = $_POST["fecha"];
	$profesion = $_POST["profesion"];
	$mensaje = $_POST["mensaje"];

	$ip=$_SERVER['REMOTE_ADDR']; 
	echo '<b>IP Address= '.$ip.'</b>';

	$query = "INSERT INTO Brains VALUES ('$ip', '$origen', '$destino', '$fecha', '$profesion', '$mensaje')";
	
	$results = $bd->exec($query);
	if($results)
		echo "One row inserted";
	else
		echo "Something wrong happend";
?>