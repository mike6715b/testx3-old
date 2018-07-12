<?php 
include_once '../includes/dbc.inc.php';

if (isset($_POST['submit'])) {
	$razredIme = $_POST['name'];

	$insert = "
	INSERT INTO classes 
	(class_name)
	VALUES
	('$razredIme')
	";
	mysqli_query($conn, $insert);
	header('Location: ../usertransaction.php?action=classadd');
} else {
	header('Location: ../mainmanu.php?Error');
}