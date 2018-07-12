<?php
include_once '../includes/dbc.inc.php';

$subject = $_GET['subjectSelect'];
$field = $_GET['fieldSelect'];

print_r($_GET);
echo '<hr><hr>';
$quesType = $_GET['quesType'];
if ($quesType == "selectAns") {

	$quesText = $_GET['questText'];
	$quesAns1 = $_GET['quesTypeSelectAns1'];
	$quesAns2 = $_GET['quesTypeSelectAns2'];
	$quesAns3 = $_GET['quesTypeSelectAns3'];
	$quesAns4 = $_GET['quesTypeSelectAns4'];
	$corrAns = $_GET['tocanOdg'];

	$pitanjeTren = [
		'pitanje' => $quesText,
		'odgovor1' => $quesAns1,
		'odgovor2' => $quesAns2,
		'odgovor3' => $quesAns3,
		'odgovor4' => $quesAns4,
		'tocanOdg' => $corrAns,
	];

	$query = "SELECT * FROM questions WHERE fieldID = '$field'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);

	if ($row == null) {
		//Znaci da nema pitanja za to field
		echo 'row == null<br>';
		//Spremanje pitanja pod br 1
		$pitanjeArr = [
			'1' => $pitanjeTren,
		];
		print_r($pitanjeArr);
		$pitanje = json_encode($pitanjeArr);

		echo '<br><br><br>JSON:';
		echo $pitanje;

		//Upis u bazu
		$insert = "
		INSERT INTO questions
		(subjectID, fieldID, questions)
		VALUES
		('$subject','$field','$pitanje')";

		$res = mysqli_query($conn, $insert);

		if (!$res) {
			echo '<br><br>Greska!';
		}

	} elseif ($row != null) {
		//echo 'row !== null<br><br>';
		$query = "SELECT * FROM questions WHERE fieldID = '$field'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		$decoded = json_decode($row['questions'], true);
		$ID = $row['ID'];
		echo '<br>DEKODIRANO IZ BAZE<br><br>';
		var_dump($decoded);
		$broj_pitanja = count($decoded);
		//echo '<br>BROJ PITANJA: ' . $broj_pitanja;

		$broj_pitanja = $broj_pitanja + 1;

		array_push($decoded, $pitanjeTren);
		echo '<br>PUSH:<br>';
		var_dump($decoded);

		//print_r($pitanjeArr);
		$pitanje = json_encode($decoded);

		echo '<br><br><br>JSON:';
		echo $pitanje;

		$delete = "DELETE FROM questions WHERE ID = '$ID'";
		$delRes = mysqli_query($conn, $delete);
		if (!$delRes) {
			echo '<br>Greska brisanja<br>';
			exit();
		}

		//Upis u bazu
		$insert = "
			INSERT INTO questions
			(ID, subjectID, fieldID, questions)
			VALUES
			('$ID','$subject','$field','$pitanje')";

		$res = mysqli_query($conn, $insert);

		if (!$res) {
			echo '<br><br>Greska!';

		}
	}
} elseif ($quesType == "typeAns") {

	$field = $_GET['fieldSelect'];
	$quesText = $_GET['questText'];
	$quesAns = $_GET['quesTypeTypeAnsAnsw'];

	$pitanjeTren = [
		'pitanje' => $quesText,
		'tocanOdg' => $quesAns,
	];

	$query = "SELECT * FROM questions WHERE fieldID = '$field'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);

	if ($row == null) {
		//Nema pitanja u ovom gradivu

		echo '$row == null';
		//Spremanje pitanja pod br 1
		$pitanjeArr = [
			'1' => $pitanjeTren,
		];
		print_r($pitanjeArr);
		$pitanje = json_encode($pitanjeArr);

		echo '<br><br><br>JSON:';
		echo $pitanje;

		//Upis u bazu
		$insert = "
		INSERT INTO questions
		(subjectID, fieldID, questions)
		VALUES
		('$subject','$field','$pitanje')";

		$res = mysqli_query($conn, $insert);

		if (!$res) {
			echo '<br><br>Greska!';
		}

	} elseif ($row != null) {
		//Ima pitanja u ovom gradivu

		echo 'row != null';
		//Dohvati trenutno pitanje
		$query = "SELECT * FROM questions WHERE fieldID = '$field'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		$decoded = json_decode($row['questions'], true);
		$ID = $row['ID'];
		echo '<br>DEKODIRANO IZ BAZE<br><br>';
		var_dump($decoded);
		$broj_pitanja = count($decoded);
		//echo '<br>BROJ PITANJA: ' . $broj_pitanja;

		$broj_pitanja = $broj_pitanja + 1;

		array_push($decoded, $pitanjeTren);
		echo '<br>PUSH:<br>';
		var_dump($decoded);

		//print_r($pitanjeArr);
		$pitanje = json_encode($decoded);

		echo '<br><br><br>JSON:';
		echo $pitanje;

		$delete = "DELETE FROM questions WHERE ID = '$ID'";
		$delRes = mysqli_query($conn, $delete);
		if (!$delRes) {
			echo '<br>Greska brisanja<br>';
			exit();
		}

		//Upis u bazu
		$insert = "
			INSERT INTO questions
			(ID, subjectID, fieldID, questions)
			VALUES
			('$ID','$subject','$field','$pitanje')";

		$res = mysqli_query($conn, $insert);

		if (!$res) {
			echo '<br><br>Greska!';

		}

	}
}

if (isset($_GET['multiInputQues'])) {
	header('Location: ../usertransactions.php?action=fieldquesadd&subject=' . $subject . '$field=' . $field);
} else {
	header('Location: ../mainmanu.php');
}