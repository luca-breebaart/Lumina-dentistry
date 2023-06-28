


<?php

include 'db.php';

$appointment_id = $_GET['appointment_id'];

$sql = "DELETE FROM appointments WHERE appointment_id = $appointment_id";

$conn->query($sql);

$conn->close();

header("location: appointments.php");

?>

