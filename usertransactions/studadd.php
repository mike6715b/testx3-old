<?php
include_once '../includes/dbc.inc.php';

if (isset($_POST['submit'])) {
	$ucenikIme = $_POST['name'];
	$ucenikPrezime = $_POST['surname'];
	$ucenikMail = $_POST['email'];
	$ucenikUid = $_POST['uid'];
	$ucenikPwd = $_POST['pwd'];
	$ucenikUloga = "ucenik";
	$ucenikRazz = $_POST['class'];

	$hashedPwd = password_hash($ucenikPwd, PASSWORD_DEFAULT);

	$insert = "
	INSERT INTO users
	(user_first, user_last, user_mail, user_uid, user_pwd, user_role, user_class)
	VALUES
	('$ucenikIme', '$ucenikPrezime', '$ucenikMail', '$ucenikUid', '$hashedPwd', '$ucenikUloga', '$ucenikRazz')
	";
	mysqli_query($conn, $insert);
	if ($_POST['check'] == 'checkyes') {
		header('Location: ../usertransaction.php?action=studadd');
	} else {
		header('Location: ../mainmanu.php');
	}
} else {
	header('Location: ../mainmanu.php?Error');
}