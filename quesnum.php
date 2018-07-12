<?php

include_once 'includes/dbc.inc.php';

$field = $_GET['field'];

$query = "SELECT * FROM questions WHERE fieldID = '$field'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
if ($row != null) {
	$decoded = json_decode($row['questions'], true);
	$num = count($decoded) + 1;
	echo $num;
} elseif ($row == null) {
	echo '1';
}