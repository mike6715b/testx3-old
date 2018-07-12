<?php 
include_once '../includes/dbc.inc.php';

if (isset($_POST['submit'])) {
	$predmetNaziv = $_POST['name'];
	$predmetAutor = $_SESSION['u_uid'];

	$insert = "
	INSERT INTO subject 
	(subj_name, subj_author)
	VALUES
	('$predmetNaziv', '$predmetAutor')
	";
	mysqli_query($conn, $insert);
	header('Location: ../mainmanu.php?action=subjadd');
} else {
	header('Location: ../mainmanu.php?Error');
}