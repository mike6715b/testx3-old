<?php include "header.php" ?>
<?php if (!isset($_SESSION['u_uid'])) {
	echo '
		<container>
			<div align="center" class="login-form">
				<form action="login.inc.php" method="POST" id="login-form">
					<div class="login-table">
						<table width="300" border="0" cellspacing="0" cellpadding="3">
						  <tbody id="tbody-login"><tr>
						    <td align="right">Korisničko ime:</td>
						    <td><input name="username" type="text" size="30" style="width: 189px;"></td>
						  </tr>
						  <tr>
						    <td align="right">Lozinka:</td>
						    <td><input name="password" type="password" size="30" style="width: 189px;"></td>
						  </tr>
						</tbody></table>
						<input type="submit" name="submit" align="right" form="login-form" value="Prijavi me">
					</div>
				</form>
			</div>
		</container>
	';
} else {
	header('Location: mainmanu.php');
}
	
?>


</body>
</html>