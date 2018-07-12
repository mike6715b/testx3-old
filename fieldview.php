<?php include "header.php"?>

<?php

include_once 'includes/dbc.inc.php';

$subj_id = $_GET['subj_id'];
$field_id = $_GET['field_id'];

$query = "SELECT * FROM questions WHERE fieldID = '$field_id' && subjectID = '$subj_id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$decoded = json_decode($row['questions'], true);

//echo '<br>DEKODIRANO IZ BAZE<br><br>';
//var_dump($decoded);

$broj_pitanja = count($decoded);
echo '<br>BROJ PITANJA:<BR>' . $broj_pitanja;
echo '<fieldset class="fieldview">';
//echo '<br><br>POPIS ELEMENATA PO PITANJIMA:<br>';
echo '<table>
	<thead>
		<tr>
			<th>Tip</th>
			<th>Pitanje</th>
			<th>Odgovor</th>
		</tr>
	</thead>
	<tbody>';

for ($nume = 0; $nume < $broj_pitanja; $nume++) {
	$num = 1;
	//Provjera tipa pitanja i spremanje u varijablu
	if (isset($decoded[$num]['odgovor3'])) {
		$tip = 'OdaberiOdgovor';
	} else {
		$tip = 'UnesiOdgovor';
	}

	if ($tip == 'OdaberiOdgovor') {
		$tocOdg = $decoded[$num]['tocanOdg'];
		$tocOdg = substr($tocOdg, 17);
	}

	echo '
	<tr>
		<td>' . $tip . '</td>
		<td>' . $decoded[$num]['pitanje'] . '</td>
		<td>';
	if ($tip == 'OdaberiOdgovor') {
		echo '1. ' . $decoded[$num]['odgovor1'] . '';
		if ($tocOdg == '1') {
			echo '<img src="img/kvacica.jpg" alt="Kvacica" height="15px" width="15px">';
		}
		echo '<br>2. ' . $decoded[$num]['odgovor2'] . '';
		if ($tocOdg == '2') {
			echo '<img src="img/kvacica.jpg" alt="Kvacica" height="15px" width="15px">';
		}
		echo '<br>3. ' . $decoded[$num]['odgovor3'] . '';
		if ($tocOdg == '3') {
			echo '<img src="img/kvacica.jpg" alt="Kvacica" height="15px" width="15px">';
		}
		echo '<br>4. ' . $decoded[$num]['odgovor4'] . '';
		if ($tocOdg == '4') {
			echo '<img src="img/kvacica.jpg" alt="Kvacica" height="15px" width="15px">';
		}
	} elseif ($tip == 'UnesiOdgovor') {
		//Nesto
		echo $decoded[$num]['tocanOdg'];
	}
	echo '</td>
	</tr>
	';
	$num = $num + 1;
}
echo '</tbody>
</table>
</fieldset>';