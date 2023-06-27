<?php

include 'db.php';

$doctor_id = $_POST['doctor_id'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$password = $_POST['password'];
$specialisation = $_POST['specialisation'];
$room_number = $_POST['room_number'];

// Check if a new image has been selected
if (isset($_FILES["profile_image"]["name"]) && !empty($_FILES["profile_image"]["name"])) {
    $profile_image = $_FILES['profile_image'];

    //updates profile image

} else {
    // No new profile image selected, update only the name and surname in the database
    $sql = "UPDATE doctors SET name = '$name', surname = '$surname', age = '$age', gender = '$gender', phone_number = '$phone_number', email = '$email', password = '$password', specialisation = '$specialisation', room_number = '$room_number' WHERE doctor_id = '$doctor_id'";
    $result = $conn->query($sql);
}

$conn->close();

header("location: doctors.php");
?>