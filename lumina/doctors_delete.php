<?php

include 'db.php';

$doctor_id = $_GET['doctor_id'];

$sql = "DELETE FROM doctors WHERE doctor_id = $doctor_id";

$conn->query($sql);

$conn->close();

header("location: doctors.php");

?>