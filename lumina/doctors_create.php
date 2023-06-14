<?php

// Before everything, acknowledge this file.
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

// Check if profile image is uploaded           //EMPTY: EXTRA VALIDATION
if (isset($_FILES["profile_image"]["name"]) && !empty($_FILES["profile_image"]["name"])) {
    $imageName = $_FILES["profile_image"]["name"];
    $imageSize = $_FILES["profile_image"]["size"];
    $tmpName = $_FILES["profile_image"]["tmp_name"];

    // Image validation
    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $imageName);
    $imageExtension = strtolower(end($imageExtension));
    
    if (!in_array($imageExtension, $validImageExtension)) {
        echo "
            <script>
                alert('Invalid Image Extension');
                document.location.href = '../lumina';
            </script>
        ";
    } elseif ($imageSize > 1200000) {
        echo "
            <script>
                alert('Image Size Is Too Large');
                document.location.href = '../lumina';
            </script>
        ";
    } else {
        $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
        $newImageName .= '.' . $imageExtension;

        // sql query:
        $sql = "INSERT INTO doctors (doctor_id, name, surname, age, gender, phone_number, email, password, specialisation, room_number, profile_image) VALUES ('$doctor_id', '$name', '$surname', '$age', '$gender', '$phone_number', '$email', '$password', '$specialisation', '$room_number', '$newImageName')";

        //$conn is from db.php. This runs the code with the authentication from the db.php file.
        $conn->query($sql);

        move_uploaded_file($tmpName, 'images/doctors_images/' . $newImageName);

        echo '
            <script>
                document.location.href = "../lumina";
            </script>
        ';
    }
} else {
    // No profile image uploaded, handle it here
    // sql query:
    $sql = "INSERT INTO doctors (doctor_id, name, surname, age, gender, phone_number, email, password, specialisation, room_number, profile_image) VALUES ('$doctor_id', '$name', '$surname', '$age', '$gender', '$phone_number', '$email', '$password', '$specialisation', '$room_number', 'noprofile.jpg')";

    //$conn is from db.php. This runs the code with the authentication from the db.php file.
    $conn->query($sql);

    echo '
        <script>
            document.location.href = "../lumina";
        </script>
    ';
}

// You need to close the connection after running the SQL to avoid errors.
$conn->close();

// This gives an instruction to go back to a different page
header("location: doctors.php");

?>
