<?php

include 'db.php';

$patients_id = $_POST['patients_id'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$password = $_POST['password'];
$medicalaid_number = $_POST['medicalaid_number'];
$previous_appointments = $_POST['previous_appointments'];

// Check if a new image has been selected


// No new profile image selected, update other details in the database
$sql = "UPDATE patients SET name = '$name', surname = '$surname', age = '$age', gender = '$gender', phone_number = '$phone_number', email = '$email', password = '$password', medicalaid_number = '$medicalaid_number', previous_appointments = '$previous_appointments' WHERE patients_id = '$patients_id'";
$result = $conn->query($sql);


$conn->close();

header("location: patient.php");
?>