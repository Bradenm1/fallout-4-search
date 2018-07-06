<?php
	// Includes database and functions files from parent, since this file is always included
	
	$table = strtoupper(strip_tags($_GET['search']));
	$colNames = get_Table_Columns($pdo, $table);
	// Get column names
	
	echo("<table id='tb' class='table table-striped table-bordered'>");
	echo("<thead>");
	echo("<tr>");
	// Have to store the column names for later use...
	$columnNames = [];
	// Loop through each column heading
	foreach($colNames->fetchAll() as $col){
		echo("<th>".$col['Field']."</th>");
		array_push($columnNames,$col['Field']); 
	}
	echo("</tr>");
	echo("</thead>");
	echo("<tbody>");
	// Translate the given data into a table
	// Loop throuh each row
	foreach($query->fetchAll() as $row){
		echo("<tr>"); // Start of row
		// Loop through each column
		foreach($columnNames as $col){
			$tableColName = $row[$col]; // Get data given the row and column name
			echo("<td id='tb-color'>".$tableColName."</td>"); // Needs to loop
		}
		echo("</tr>"); // End of row
	}
	echo("</tbody>");
	echo("</table>");
	// D202
?>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="js/tbDropDown.js"></script>