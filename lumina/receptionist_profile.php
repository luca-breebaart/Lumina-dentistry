<?php

include 'db.php';

if (isset($_FILES["profile_image"]["name"])) {
    $receptionists_id = $_POST["receptionists_id"];
    $name = $_POST["name"];

    // Check if a new image has been selected
    if ($_FILES["profile_image"]["name"] != "") {
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
                    document.location.href = '../lumina/receptionist.php';
                </script>
            ";
            exit;
        } elseif ($imageSize > 1200000) {
            echo "
                <script>
                    alert('Image Size Is Too Large');
                    document.location.href = '../lumina/receptionist.php';
                </script>
            ";
            exit;
        }

        $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
        $newImageName .= '.' . $imageExtension;

        move_uploaded_file($tmpName, 'images/receptionist_images/' . $newImageName);

        // Update the profile image in the database
        $stmt = $conn->prepare("UPDATE receptionists SET profile_image = ? WHERE receptionists_id = ?");
        $stmt->bind_param("si", $newImageName, $receptionists_id);
        $stmt->execute();
        $stmt->close();
    }

    echo '
        <script>
            document.location.href = "../lumina/receptionist.php";
        </script>
    ';
    exit;
}

?>
