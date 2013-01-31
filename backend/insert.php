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

	$fields = "(ip, src, latSrc, lonSrc, dst, latDst, lonDst, year, month, prof, msg, time)";

	$values = "('$ip', '$origen', '$latO', '$lonO', '$destino', '$latD', '$lonD', 
				'$year', '$month', '$profesion', '$mensaje', ".time().")";
	
	echo '<br>[PHP] fields: '.$fields;
	echo '<br>[PHP] values: '.$values;

	$query = "INSERT INTO Brains ".$fields."VALUES ".$values;
	
	$results = $bd->exec($query);

	if($results)
		echo "<br> [SQL] One row inserted";
	else
		echo "<br> [SQL] Something wrong happend";

	// Updating JSON script
	echo "<br> [PYTHON] ";
	echo exec("./generarJSON.py");
?>