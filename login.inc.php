<?php include "header.php"?>

<?php

session_start();

if (isset($_POST['submit'])) {
	//Submit button IS pressed
	$uid = mysqli_real_escape_string($conn, $_POST['username']);
	$pwd = mysqli_real_escape_string($conn, $_POST['password']);

	//Check for empty fields
	if ($uid != null && $pwd != null) {

		$sql = "SELECT * FROM users WHERE user_uid='$uid'";
		$query = mysqli_query($conn, $sql);
		$queryResult = mysqli_num_rows($query);

		//Check if username is in database
		if ($queryResult < 1) {
			//Username not in database
			header('Location: index.php?login=error');
			exit();

			//If username exists
		} else {
			//Username exists!

			if ($row = mysqli_fetch_assoc($query)) {
				//Fetch results

				//Verify the password
				$hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
				if ($hashedPwdCheck == true) {
					//Login the user
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_mail'] = $row['user_mail'];
					$_SESSION['u_uid'] = $row['user_uid'];
					$_SESSION['u_role'] = $row['user_role'];

					header('Location: mainmanu.php?login=ok');

				} elseif ($hashedPwdCheck == false) {
					header('Location: index.php?login=error');
					exit();
				}

			} else {header('Location: index.php?login=error');exit();}

		}

		//If field is empty
	} else {header('Location: index.php?login=error');exit();}
//If button not pressed
} else {
	header('Location: index.php');exit();}
?>
</body>
</html>
