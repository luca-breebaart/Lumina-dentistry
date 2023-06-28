<?php

include 'db.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$password = $_POST['password'];
$rank = $_POST['rank'];

// Check if profile image is uploaded
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
        exit;
    } elseif ($imageSize > 1200000) {
        echo "
            <script>
                alert('Image Size Is Too Large');
                document.location.href = '../lumina';
            </script>
        ";
        exit;
    }

    $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
    $newImageName .= '.' . $imageExtension;

    $sql = "INSERT INTO receptionists (name, surname, age, gender, phone_number, email, password, rank, profile_image) 
            VALUES ('$name', '$surname', '$age', '$gender', '$phone_number', '$email', '$password', '$rank', '$newImageName')";

    $conn->query($sql);

    move_uploaded_file($tmpName, 'images/receptionist_images/' . $newImageName);

} else {
    // No profile image uploaded
    $noProfileImage = 'noprofile.jpg';

    $sql = "INSERT INTO receptionists (name, surname, age, gender, phone_number, email, password, rank, profile_image) 
            VALUES ('$name', '$surname', '$age', '$gender', '$phone_number', '$email', '$password', '$rank', '$noProfileImage')";

    $conn->query($sql);
}

$conn->close();

header("location: receptionist.php");
exit;

?>
