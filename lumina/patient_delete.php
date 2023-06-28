


<?php

include 'db.php';

$patient_id = $_GET['patients_id'];

$sql = "DELETE FROM patients WHERE patients_id = $patient_id";

$conn->query($sql);

$conn->close();

header("location: patient.php");

?>

