<?php 
include_once '../includes/dbc.inc.php';

if (isset($_POST['submit'])) {
	$profIme = $_POST['name'];
	$profPrezime = $_POST['surname'];
	$profMail = $_POST['email'];
	$profUid = $_POST['uid'];
	$profPwd = $_POST['pwd'];
	$profUloga = "teacher";

	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

	$insert = "
	INSERT INTO users 
	(user_first, user_last, user_mail, user_uid, user_pwd, user_role)
	VALUES
	('$profIme', '$profPrezime', '$profMail', '$profUid', '$hashedPwd', '$profUloga')
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