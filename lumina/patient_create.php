<?php

// Include the database connection file
include 'db.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$medicalaid_number = $_POST['medicalaid_number'];

// SQL query to insert patient details into the database
$sql = "INSERT INTO patients (name, surname, age, gender, phone_number, email,  medicalaid_number) VALUES ('$name', '$surname', '$age', '$gender', '$phone_number', '$email', '$medicalaid_number')";

// Execute the query
$result = $conn->query($sql);

// Check if the query was successful
if ($result === TRUE) {
    // Redirect to the desired page after successful insertion
    header("location: patient.php");
} 

// Close the database connection
$conn->close();

?>
