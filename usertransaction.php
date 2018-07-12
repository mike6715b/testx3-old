<?php include "header.php"?>

<?php
if (isset($_SESSION['u_uid']) && isset($_GET['action'])) {
	if ($_SESSION['u_role'] == "admin" || $_SESSION['u_role'] == "teacher") {
		$action = $_GET['action'];
		switch ($action) {
		case "exam":
			//TO DO:
			//Dati opciju za odabir predmeta i gradiva i razreda kojem se pusta provjera
			//Opcija pregleda aktivnih zadaca i rezultata
			//Neki oblik brzog pregleda pitanja

			break;

		case "contrlexam":
			//TO DO:
			//Mogucnost da se pise ispit koji god zelimo kao admin
			break;

		case "selfcheck":
			//TO DO:
			//Mogucnost pisanja bilo koje samoprovjere kao admin
			break;

		case "classadd":
			echo '
					<container class="add-class" align="center">
						<fieldset>
							<legend align="left">Dodavanje razreda</legend>
							<form action="usertransactions/classadd.php" method="POST">
								<p>
									<label for="name">
				        				<span>Ime razreda: </span>
				     				</label>
				      				<input type="text" name="name" required>
				      			</p>
								<p> <button type="submit" name="submit">Unesi podatke</button> </p>
							</form>
						</fieldset>
					</container>
				';
			break;

		case "studadd":
			echo '
					<container class="add-student" align="center">
						<fieldset>
							<legend align="left">Dodavanje ucenika</legend>
							<form action="usertransactions/studadd.php" method="POST">
								<p>
									<label for="name">
				        				<span>Ime: </span>
				     				</label>
				      				<input type="text" name="name" required>
				      			</p>
				      			<p>
									<label for="surname">
				        				<span>Prezime: </span>
				     				</label>
				      				<input type="text" name="surname" required>
				      			</p>
				      			<p>
									<label for="email">
				        				<span>E-Mail: </span>
				     				</label>
				      				<input type="text" name="email" required>
				      			</p>
				      			<p>
									<label for="uid">
				        				<span>Korisnicko ime: </span>
				     				</label>
				      				<input type="text" name="uid" required>
				      			</p>
				      			<p>
									<label for="pwd">
				        				<span>Lozinka: </span>
				     				</label>
				      				<input type="password" name="pwd" required>
				      			</p>
								<p>
									<label for="class">
										<span>Razred: </span>
									</label>
									<select name="class">
									';
			$queryClasses = "SELECT * FROM classes";
			$resultClasses = mysqli_query($conn, $queryClasses);
			while ($row_classes = mysqli_fetch_array($resultClasses)) {
				echo '<option value="' . $row_classes['class_name'] . '">' . $row_classes['class_name'] . '</option>';
			}

			echo '
									</select>
								</p>
								<p>
									<label for="check">
										<span>Visestruki unos? </span>
									</label>
									<select name="check" >
										<option value="checkno">Ne</option>
										<option value="checkyes">Da</option>
									</select>
								</p>
								<p> <button type="submit" name="submit">Unesi podatke</button> </p>
							</form>
						</fieldset>
					</container>
				';

			break; //case "studadd"

		case "studlist":
			echo '
					<fieldset>
						<legend>Popis Ucenika</legend>
						<table>
							<thead>
								<tr>
									<th>Ime</th>
									<th>Prezime</th>
									<th>E-Mail</th>
									<th>Korisnicko ime</th>
								</tr>
							</thead>
							<tbody>
								';
			$queryUsers = "SELECT * FROM users";
			$resultsUsers = mysqli_query($conn, "SELECT * FROM users");
			while ($row_users = mysqli_fetch_array($resultsUsers)) {
				echo "
									    	<tr>
									    		<td>" . $row_users['user_first'] . "</td>
									    		<td>" . $row_users['user_last'] . "</td>
									    		<td>" . $row_users['user_mail'] . "</td>
									    		<td>" . $row_users['user_uid'] . "</td>
									    	</tr>
									    ";
			}
			echo '
							</tbody>
						</table>
					</fieldset>
				';
			break; //case "studlist"
		case "teachadd":
			echo '
					<container class="add-teacher" align="center">
						<fieldset>
							<legend align="left">Dodavanje profesora</legend>
							<form action="usertransactions/teachadd.php" method="POST">
								<p>
									<label for="name">
				        				<span>Ime: </span>
				     				</label>
				      				<input type="text" name="name" required>
				      			</p>
				      			<p>
									<label for="surname">
				        				<span>Prezime: </span>
				     				</label>
				      				<input type="text" name="surname" required>
				      			</p>
				      			<p>
									<label for="email">
				        				<span>E-Mail: </span>
				     				</label>
				      				<input type="text" name="email" required>
				      			</p>
				      			<p>
									<label for="uid">
				        				<span>Korisnicko ime: </span>
				     				</label>
				      				<input type="text" name="uid" required>
				      			</p>
				      			<p>
									<label for="pwd">
				        				<span>Lozinka: </span>
				     				</label>
				      				<input type="password" name="pwd" required>
				      			</p>
								<p>
									<label for="check">
										<span>Visestruki unos? </span>
									</label>
									<select name="check" >
										<option value="checkno">Ne</option>
										<option value="checkyes">Da</option>
									</select>
								</p>
								<p> <button type="submit" name="submit">Unesi podatke</button> </p>
							</form>
						</fieldset>
					</container>
				';
			break; //case "teachadd"

		case "teachlist":
			echo '
					<fieldset>
						<legend>Popis profesora</legend>
						<table>
							<thead>
								<tr>
									<th>Ime</th>
									<th>Prezime</th>
									<th>E-Mail</th>
									<th>Korisnicko ime</th>
								</tr>
							</thead>
							<tbody>
								';
			$resultsUsers = mysqli_query($conn, "SELECT * FROM users WHERE user_role = 'teacher'");
			while ($row_users = mysqli_fetch_array($resultsUsers)) {
				echo "
									    	<tr>
									    		<td>" . $row_users['user_first'] . "</td>
									    		<td>" . $row_users['user_last'] . "</td>
									    		<td>" . $row_users['user_mail'] . "</td>
									    		<td>" . $row_users['user_uid'] . "</td>
									    	</tr>
									    ";
			}
			echo '
							</tbody>
						</table>
					</fieldset>
				';
			break;

		case "subjadd":
			echo '
					<container class="add-subject" align="center">
						<fieldset>
							<legend align="left">Dodavanje predmeta</legend>
							<form action="usertransactions/subjadd.php" method="POST">
								<p>
									<label for="name">
				        				<span>Naziv predmeta: </span>
				     				</label>
				      				<input type="text" name="name" required>
				      			</p>
								<p> <button type="submit" name="submit">Unesi podatke</button> </p>
							</form>
						</fieldset>
					</container>
				';
			break; //case "subjadd"

		case "subjlist":
			echo '
					<fieldset>
						<legend>Popis Predmeta</legend>
						<table>
							<tbody>
								';
			$numer = 1;
			$queryUsers = "SELECT * FROM subject";
			$resultsUsers = mysqli_query($conn, "SELECT * FROM subject");
			while ($row_users = mysqli_fetch_array($resultsUsers)) {
				echo "
									    	<tr>
									    		<td>" . $numer . ". " . $row_users['subj_name'] . "</td>
									    	</tr>
									    ";
				$numer++;
			}
			echo '
							</tbody>
						</table>
					</fieldset>
				';
			break; //case "subjlist"

		case "fieldadd":
			echo '
					<fieldset align="left">
						<legend>Unos gradiva</legend>
						<form action="usertransactions/fieldadd.php" method="POST">
							<p>
								<label for="subjectSelect">
				        			<span>Predmet: </span>
				     			</label>
				     			<select name="subjectSelect" required>
				     			';
			$querySubjects = "SELECT * FROM subject";
			$resultSubjects = mysqli_query($conn, $querySubjects);
			while ($row_subjects = mysqli_fetch_array($resultSubjects)) {
				echo '<option value="' . $row_subjects['subj_id'] . '">' . $row_subjects['subj_name'] . '</option>';
			}

			echo '
							</select>
				      		</p>
							<p>
								<label for="name">
				        			<span>Naziv gradiva: </span>
				     			</label>
				      			<input type="text" name="field" required>
				      		</p>
				      		<p>
				      			<label for="checkboxfield">
				      				<span>Upis pitanja? </span>
				      			</label>
				      			<input type="checkbox" name="checkboxField" value="checkboxYes">
				      		</p>
							<p> <input type="submit" name="submit" value="Unesi podatke"> </p>
						</form>
					</fieldset>
				';
			break; //case "fieldadd"

		case "fieldquesadd":
			//TO DO:
			//Kada se odabered drugi oblik pitanja, resetiraju se polja u prazno
			//Vidjeti se trenutni broj upisanih pitanja
			echo '
				<fieldset align="left">
					<legend>Unos pitanja</legend>
					<form action="usertransactions/fieldquesadd.php" method="GET" id="quesaddform">
					<div class="fieldQuesAddChoice">
						<p>
							<label for="subjectSelect">
								<span>Predmet:  </span>
							</label>
							<select name="subjectSelect" required id="subjectSelect">
								<option value=""></option>
							';
			$querySubjects = "SELECT * FROM subject";
			$resultSubjects = mysqli_query($conn, $querySubjects);
			while ($row_subjects = mysqli_fetch_array($resultSubjects)) {
				echo '<option value="' . $row_subjects['subj_id'] . '">' . $row_subjects['subj_name'] . '</option>';
			}
			//TO DO:
			//Dodati opciju za visestruke odgovore
			echo '
							</select>
						</p>
						<p class="fieldSelect">
							<label for="fieldSelect">
								<span>Gradivo: </span>
							</label>
							<select name="fieldSelect" id="fieldSelectQues" required>

							</select>
						</p>
						<p>
							<input type="button" name="button" value="Uredu" id="fieldQeusAddBtn">
						</p>
					</div>
					<div id="inputQuestion" style="display: none;">
						<p id="qustionNum">
							Pitanje br.:
						</p>
						<p>
							<label for="quesType">
								<span>Tip pitanja: </span>
							</label>
							<select name="quesType" id="quesType" required>
								<option value=""></option>
								<option value="selectAns">Odabir odgovora</option>
								<option value="typeAns">Unesi odgovor</option>
							</select>
						</p>
						<p id="quesInputField" style="display: none;">
							<label for="questText">
								<span>Unesite pitanje: </span>
							</label> <br>
							<input type="text" name="questText" id="questText" style=" width: 500px; height: 150px">
						</p>
						<p id="quesTypeSelectAns" style="display: none;">
							<label for="quesTypeSelectAns1">Odgovor 1: </label>
							<input type="text" name="quesTypeSelectAns1" id="quesTypeSelectAns1"><input type="radio" name="tocanOdg" placeholder="Tocan odgovor?" id="tocanOdg1" value="quesTypeSelectAns1"><br>
							<label for="quesTypeSelectAns2">Odgovor 2: </label>
							<input type="text" name="quesTypeSelectAns2" id="quesTypeSelectAns2"><input type="radio" name="tocanOdg" placeholder="Tocan odgovor?" id="tocanOdg2" value="quesTypeSelectAns2"><br>
							<label for="quesTypeSelectAns3">Odgovor 3: </label>
							<input type="text" name="quesTypeSelectAns3" id="quesTypeSelectAns3"><input type="radio" name="tocanOdg" placeholder="Tocan odgovor?" id="tocanOdg3" value="quesTypeSelectAns3"><br>
							<label for="quesTypeSelectAns4">Odgovor 4: </label>
							<input type="text" name="quesTypeSelectAns4" id="quesTypeSelectAns4"><input type="radio" name="tocanOdg" placeholder="Tocan odgovor?" id="tocanOdg4" value="quesTypeSelectAns4"><br>
						</p>
						<p id="quesTypeTypeAns" style="display: none;">
							<label for="quesTypeTypeAnsAnsw">
								<span>Tocan odgovor: </span>
							</label>
							<input type="text" name="quesTypeTypeAnsAnsw" placeholder="Tocan odgovor" id="quesTypeAnsAnsw">
						</p>
						<label for="multiInputQues">Nastaviti? </label>
						<input type="checkbox" name="multiInputQues" value="multiInputQues"> <br>
						<input type="button" value="Unesi pitanje" id="submitQuesBtn" style="display: none;">
					</div>
					</form>
				</fieldset>
			';
			break; //case "fieldquesadd"

		case "fieldlist":
			echo '
				<fieldset>
					<legend>Prikaz gradiva</legend>
					<p>
						<label for="selectSubjectList">
							<span>Predmet:</span>
						</label>
						<select name="selectSubjectList" id="selectSubjectList" required>
						<option value=""></option>
			';
			$querySubjects = "SELECT * FROM subject";
			$resultSubjects = mysqli_query($conn, $querySubjects);
			while ($row_subjects = mysqli_fetch_array($resultSubjects)) {
				echo '<option value="' . $row_subjects['subj_id'] . '">' . $row_subjects['subj_name'] . '</option>';
			}
			echo '
						</select>
					</p>
					<p>
						<table>
							<thead>
								<tr>
									<th>ID</th>
									<th>Naziv gradiva</th>
								</tr>
							</thead>
							<tbody id="fieldListTbody">

							</tbody>
						</table>
					</p>
				</fieldset>
			';
			break; //case "fieldlist"

		default:
			header('Location: mainmanu.php?error=unknownaction');
			break;
		} //endSwitch
	} elseif ($_SESSION['u_role'] == "ucenik") {
		$action = $_GET['action'];
		switch ($action) {
		case "examstart":
			// code...
			break; //case "examstart"

		case "examreslist":

			break; //case "examreslist"

		default:
			header('Location: mainmanu.php?error=unknownaction');
			break;
		}
	} else {
		header('Location: mainmanu.php?error=unknownrole');
	}
} else {
	header('Location: index.php?error=notloggedin');
}
?>
<script>
$(document).ready(function() {
		console.log("Script OK!");
		$("#subjectSelect").on('change', function() {
			var selectedValue = $(this).val();
			console.log("Obabrano: " + selectedValue);
			var dataString = "choice=" + selectedValue;
			$.ajax({
				type: "GET",
				url: "getter.php",
				data: dataString,
				cahce: false,
				success: function(html) {
					//console.log("Success!");
					$("#fieldSelectQues").html(html);
				}
			});
		});

		$("#fieldQeusAddBtn").click(function() {
			if ($("#subjectSelect").val() > 0 && $("#fieldSelectQues").val() > 0) {
				$(".fieldQuesAddChoice").hide();
				console.log("Izbor uklonjen.");
				$("#inputQuestion").show();
				//$("#qustionNum").append("192");
				console.log("Dobavljanje broj pitanja...");
				var selectedField = $("#fieldSelectQues").val();
				var dataString = "field=" + selectedField;
				$.ajax({
					type: "GET",
					url: "quesnum.php",
					data: dataString,
					cache: false,
					success: function(html) {
						$("#qustionNum").append(html);
						console.log("Broj pitanja:" + html);
					}
				});
			} else {
				alert("Popunite sve opcije!");
			}
		});

		$("#selectSubjectList").on('change', function() {
			var selectedValue = $(this).val();
			//console.log("Odabrano: "+selectedValue);
			var dataString = "choice=" + selectedValue;
			$.ajax({
				type: "POST",
				url: "fieldlist.php",
				data: dataString,
				cache: false,
				success: function(html) {
					//console.log("Success!");
					$("#fieldListTbody").html(html);
				}
			});
		});

		$("#quesType").on('change', function() {
			var val = $("#quesType").val();
			$("#quesInputField").show();
			if (val == "selectAns") {
				$("#quesTypeTypeAns").hide();
				//console.log("selectAns izabrano");
				$("#quesTypeSelectAns").show();
				$("#submitQuesBtn").show();
			} else if (val == "typeAns") {
				$("#quesTypeSelectAns").hide();
				//console.log("typeAns izabrano");
				$("#quesTypeTypeAns").show();
				$("#submitQuesBtn").show();
			}
		});

		$("#submitQuesBtn").on('click', function () {
			//TO DO:
			//Submitting za selectAns
			//Handeling za typeAns
			var quesType = $("#quesType").val();
			if (quesType == "selectAns") {
				var ques = $("#questText").val();
				var ans1len = $("#quesTypeSelectAns1").val().lenght;
				var ans2len = $("#quesTypeSelectAns2").val().lenght;
				var ans3len = $("#quesTypeSelectAns3").val().length;
				var ans4len = $("#quesTypeSelectAns4").val().length;
				var ans1 = $("#quesTypeSelectAns1").val();
				var ans2 = $("#quesTypeSelectAns2").val();
				var ans3 = $("#quesTypeSelectAns3").val();
				var ans4 = $("#quesTypeSelectAns4").val();
				if (ques !== 0 && ans1len !== 0 && ans2len !== 0 && ans3len !== 0 && ans4len !== 0) {
					$("#quesaddform").submit();

				} else {
					alert("Popunite sva polja!");
				}
			} else if (quesType == "typeAns") {
				var ques = $("#questText").val().lenght;
				var ans = $("#quesTypeAnsAnsw").val().lenght;
				if (ques != 0 && ans != 0) {
					$("#quesaddform").submit();
				}
			}
		});
	});
</script>
</body>
</html>