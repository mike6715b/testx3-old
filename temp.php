<?php

include_once 'includes/dbc.inc.php';

$ucenikIme = $_POST['name'];
$ucenikPrezime = $_POST['surname'];
$ucenikMail = $_POST['email'];
$ucenikUid = $_POST['uid'];
$ucenikPwd = $_POST['pwd'];
$ucenikUloga = "ucenik";
$ucenikRazz = $_POST['class'];

$hashedPassword = password_hash($ucenikPwd, PASSWORD_DEFAULT);

$insert = "
INSERT INTO users
(user_first, user_last, user_mail, user_uid, user_pwd, user_role, user_class)
VALUES
('$ucenikIme', '$ucenikPrezime', '$ucenikMail', '$ucenikUid', '$hashedPassword', '$ucenikUloga', '$ucenikRazz')";
mysqli_query($conn, $insert);

if ($_POST['check'] == 'checkyes') {
	header('Location: ../usertransaction.php?action=studadd');
} else {
	header('Location: ../mainmanu.php');
}