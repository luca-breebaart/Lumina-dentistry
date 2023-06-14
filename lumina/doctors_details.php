<!DOCTYPE html>
<html>

<head>
    <title>Doctor Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .card {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 50px;
            top: 100px;
        }

        .profile-image {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
            margin: 0 auto;
            margin-top: -100px;
            border: 2px solid #e4e4e4;
        }
    </style>
</head>

<body>
    <?php
    include 'db.php'; // Include your database connection file
    
    // Retrieve the doctor ID from the query parameter
    if (isset($_GET['doctor_id'])) {
        $doctorId = $_GET['doctor_id'];

        // Fetch the doctor details from the database using the doctor ID
        $sql = "SELECT * FROM doctors WHERE doctor_id = $doctorId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Doctor found, display the details
            $doctor = $result->fetch_assoc();
            ?>
            <div class="card">
                <img src="images/doctors_images/<?php echo $doctor['profile_image']; ?>" class="card-img-top profile-image"
                    alt="Profile Image">
                <div class="card-body">
                    <h5 class="card-title">Doctor Details</h5>
                    <table class="table">
                        <tr>
                            <th>Doctor ID</th>
                            <td>
                                <?php echo $doctor["doctor_id"]; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>
                                <?php echo $doctor["name"]; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Surname</th>
                            <td>
                                <?php echo $doctor["surname"]; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Age</th>
                            <td>
                                <?php echo $doctor["age"]; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>
                                <?php echo $doctor["gender"]; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>
                                <?php echo $doctor["phone_number"]; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>
                                <?php echo $doctor["email"]; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Specialisation</th>
                            <td>
                                <?php echo $doctor["specialisation"]; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Room Number</th>
                            <td>
                                <?php echo $doctor["room_number"]; ?>
                            </td>
                        </tr>
                        <!-- Include other doctor details here -->
                    </table>
                    <div class="btn-group" role="group">
                        <a class="btn btn-custom-edit" href="doctors.php?doctor_id=<?php echo $row['doctor_id']; ?>"
                            role="button">Edit</a>
                        <a class="btn button-delete" href="doctors_delete.php?doctor_id=<?php echo $row['doctor_id']; ?>"
                            role="button">Delete</a>
                    </div>
                    <a href="doctors.php" class="btn btn-primary">Return</a>
                </div>
            </div>
            <?php
        } else {
            // Doctor not found
            echo '<div class="alert alert-info">Doctor not found.</div>';
        }
    } else {
        // Invalid or missing doctor ID
        echo '<div class="alert alert-danger">Invalid doctor ID.</div>';
    }

    $conn->close();
    ?>
</body>

</html>