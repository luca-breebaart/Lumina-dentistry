<?php

include 'db.php';

$doctor_id = $_POST['doctor_id'];
$name = $_POST['name'];
$surname = $_POST['surname'];

// Check if a new image has been selected
if (isset($_FILES["profile_image"]["name"]) && !empty($_FILES["profile_image"]["name"])) {
    $profile_image = $_FILES['profile_image'];

    //u[dates profile image

} else {
    // No new profile image selected, update only the name and surname in the database
    $sql = "UPDATE doctors SET name = '$name' WHERE doctor_id = '$doctor_id'";
    $result = $conn->query($sql);

    $sql = "UPDATE doctors SET surname = '$surname' WHERE doctor_id = '$doctor_id'";
    $result = $conn->query($sql);
}

$conn->close();

header("location: doctors.php");
?>