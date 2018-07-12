<?php include "header.php"?>

<div class="main-menu">
<?php
if (isset($_SESSION['u_uid'])) {
	$action = $_SESSION['u_role'];
	switch ($action) {
	case "admin":
		echo '
			<container id="main-menu" align="center">
				<fieldset>
					<legend align="left">Zadace</legend>
					<table>
						<tbody>
							<tr>
								<td><p><a href="usertransaction.php?action=exam">Stvaranje zadace</a></p>
					            </td>
					            <td><p><a href="usertransaction.php?action=contrlexam">Kontrolne zadace</a></p></td>
					            <td><p><a href="usertransaction.php?action=selfcheck">Samoprovjere</a></p></td>
							</tr>
						</tbody>
					</table>
				</fieldset>
				<fieldset>
					<legend>Korisnici</legend>
					<table>
						<tbody>
							<tr>
								<td><a href="usertransaction.php?action=studadd"><p>Unos ucenika</p></a></td>
								<td><a href="usertransaction.php?action=classadd" title="Dodavanje razreda"><p>Unos razreda</p></a></td>
								<td><a href="usertransaction.php?action=studlist"><p>Prikaz ucenika</p></a></td>
								<td><a href="usertransaction.php?action=teachadd"><p>Unos profesora</p></a></td>
								<td><a href="usertransaction.php?action=teachlist"><p>Prikaz profesora</p></a></td>
							</tr>
						</tbody>
					</table>
				</fieldset>
				<fieldset>
					<legend>Predmeti</legend>
					<table>
						<tbody>
							<tr>
								<td><a href="usertransaction.php?action=subjadd"><p>Dodaj predmet</p></a></td>
								<td><a href="usertransaction.php?action=subjlist"><p>Prikaz predmeta</p></a></td>
							</tr>
						</tbody>
					</table>
				</fieldset>
				<fieldset>
					<legend>Gradivo</legend>
					<table>
						<tbody>
							<tr>
								<td><a href="usertransaction.php?action=fieldadd"><p>Unos novog gradiva</p></a></td>
								<td><a href="usertransaction.php?action=fieldquesadd"><p>Unos pitanja</p></a></td>
								<td><a href="usertransaction.php?action=fieldlist"><p>Prikaz gradiva</p></a></td>
							</tr>
						</tbody>
					</table>
				</fieldset>
			</container>
		';
		break;

	case "ucenik":
		echo '
				<container id="main-menu" align="center">
					<fieldset>
						<legend>Zadace</legend>
						<table>
							<tbody>
								<tr>
									<td>
										<a href="usertransaction.php?action=examstart"><p>Pisanje Zadace</p></a>
									</td>
									<td>
										<a href="usertransaction.php?action=examreslist"><p>Prikaz rezultata zadace</p></a>
									</td>
								</tr>
							</tbody>
						</table>
					</fieldset>
				</container>
			';
		break;
	default:
		header('Location: mainmanu.php?error=unknownuserrole');
		break;
	}

} else {
	header('Location: index.php?error=notloggedin');
}
?>



</div>
</body>
</html>