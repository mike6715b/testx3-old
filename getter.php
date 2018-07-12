<?php include "includes/dbc.inc.php"?>
<?php session_start();?>

<?php

$choice = $_GET['choice'];

$query = "SELECT * FROM fielda WHERE field_subj_id='$choice'";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
	echo '<option value="' . $row['field_id'] . '">' . $row['field_name'] . '</option>';
}
