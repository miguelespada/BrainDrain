
Hello, insertion test in sqlite.

<?php
	$bd = new SQLite3('test.db');
	$origen = $_POST["origen"];
	$query = "INSERT INTO Cars VALUES (10, '$origen', 1000)";
	
	$results = $bd->exec($query);
	if($results)
		echo "One row inserted";
	else
		echo "Something wrong happend";

	$results = $bd->queryArray('SELECT * FROM Cars');
	while ($row = $results->fetchArray()) {
    	var_dump($row);
}?>