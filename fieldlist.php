<?php include "includes/dbc.inc.php"?>
<?php session_start();?>
<?php

$choice = $_POST['choice'];

$queryFields = "SELECT * FROM fielda WHERE field_subj_id = '$choice'";
$resultsFields = mysqli_query($conn, $queryFields);
while ($row = mysqli_fetch_array($resultsFields)) {
	echo '
		<tr>
		<td>' . $row['field_id'] . '</td>
		<td>' . $row['field_name'] . '</td>
		<td><a href="fieldview.php?field_id=' . $row['field_id'] . '&subj_id=' . $choice . '">Pregled</a></td>
		</tr>
	';
}