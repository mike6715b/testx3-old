<?php
include_once '../includes/dbc.inc.php';

if (isset($_POST['submit'])) {
	$subjectID = $_POST['subject'];
	$fieldIme = $_POST['field'];

	$insert = "
		INSERT INTO fielda
		(field_name, field_subj_id)
		VALUES
		('$fieldIme', '$subjectID')
		";
	mysqli_query($conn, $insert);

	if ($_POST['checkboxField'] == "checkboxYes") {
		header('Location: ../usertransaction.php?action=fieldquesadd');
	} else {
		header('Location: ../usertransaction.php?done');
	}
} else {
	header('Location: ../mainmanu.php?ErrorNoSubmit');
}