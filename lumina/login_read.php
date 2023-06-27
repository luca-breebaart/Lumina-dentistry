<?php
session_start();
include "db.php";

if (isset($_POST['name']) && isset($_POST['password'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['name']);
    $password = validate($_POST['password']);

    if (empty($name)) {
        header("Location: login.php?error=User Name is required");
        exit();
    } else if (empty($password)) {
        header("Location: login.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM doctors WHERE name='$name' AND password='$password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['name'] === $name && $row['password'] === $password) {
                $_SESSION['name'] = $row['name'];
                $_SESSION['surname'] = $row['surname'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['profile_image'] = 'images/doctors_images/' . $row['profile_image'];
                $_SESSION['doctor_id'] = $row['doctor_id'];
                header("Location: appointments.php");
                exit();
            } else {
                header("Location: login.php?error=Incorect User name or password");
                exit();
            }
        } else {
            header("Location: login.php?error=Incorect User name or password");
            exit();
        }
    }

} else {
    header("Location: login.php");
    exit();
}