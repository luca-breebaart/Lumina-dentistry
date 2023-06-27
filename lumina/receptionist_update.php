<?php

include 'db.php';

$receptionists_id = $_POST['receptionists_id'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$password = $_POST['password'];
$rank = $_POST['rank'];

// Check if a new image has been selected
if (isset($_FILES["profile_image"]["name"]) && !empty($_FILES["profile_image"]["name"])) {
    $profile_image = $_FILES['profile_image'];

    // Update profile image

} else {
    // No new profile image selected, update only the name, surname, age, gender, phone_number, email, password, and rank in the database
    $sql = "UPDATE receptionists SET name = '$name', surname = '$surname', age = '$age', gender = '$gender', phone_number = '$phone_number', email = '$email', password = '$password', rank = '$rank' WHERE receptionists_id = '$receptionists_id'";
    $result = $conn->query($sql);
}

$conn->close();

header("location: receptionist.php");
?>
