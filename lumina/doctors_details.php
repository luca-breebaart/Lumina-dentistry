<!-- Doctor Details Page -->
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

        .details-image {
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
                <img src="images/doctors_images/<?php echo $doctor['profile_image']; ?>" class="details-image"
                    alt="Profile Image">
                <div class="card-body">
                    <?php if (isset($_GET['edit']) && $_GET['edit'] === 'true'): ?>
                        <!-- Edit form -->

                        <form class="form-inline m-2" id="form" action="" enctype="multipart/form-data" method="post">

                            <div class="upload">
                                <?php
                                $doctor_id = $doctor["doctor_id"];
                                $name = $doctor["name"];
                                $profile_image = $doctor["profile_image"];
                                ?>

                                <div class="round">
                                    <input type="hidden" name="doctor_id" value="<?php echo $doctor_id; ?>">
                                    <input type="hidden" name="name" value="<?php echo $name; ?>">

                                    <input type="file" class="form-control-file" id="profile_image" name="profile_image"
                                        accept=".jpg, .jpeg, .png">
                                </div>
                            </div>

                        </form>


                        <form class="edit-form" action="doctors_update.php" method="POST" enctype="multipart/form-data">
                            <h5 class="card-title">Doctor Details (Edit Mode)</h5>
                            <table class="table">
                                <tr>
                                    <th>Doctor ID</th>
                                    <td>
                                        <?php echo $doctor["doctor_id"]; ?>
                                        <input type="hidden" name="doctor_id" value="<?php echo $doctor["doctor_id"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>
                                        <input type="text" class="form-control" name="name" value="<?php echo $doctor["name"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Surname</th>
                                    <td>
                                        <input type="text" class="form-control" name="surname"
                                            value="<?php echo $doctor["surname"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Age</th>
                                    <td>
                                        <input type="number" class="form-control" name="age" value="<?php echo $doctor["age"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>
                                        <select class="form-control" name="gender">
                                            <option value="male" <?php if ($doctor["gender"] === "male")
                                                echo "selected"; ?>>Male
                                            </option>
                                            <option value="female" <?php if ($doctor["gender"] === "female")
                                                echo "selected"; ?>>
                                                Female</option>
                                            <option value="other" <?php if ($doctor["gender"] === "other")
                                                echo "selected"; ?>>Other
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Phone Number</th>
                                    <td>
                                        <input type="tel" class="form-control" name="phone_number"
                                            value="<?php echo $doctor["phone_number"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>
                                        <input type="email" class="form-control" name="email"
                                            value="<?php echo $doctor["email"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Password</th>
                                    <td>
                                        <input type="text" class="form-control" name="password"
                                            value="<?php echo $doctor["password"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Specialisation</th>
                                    <td>
                                        <input type="text" class="form-control" name="specialisation"
                                            value="<?php echo $doctor["specialisation"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Room Number</th>
                                    <td>
                                        <input type="text" class="form-control" name="room_number"
                                            value="<?php echo $doctor["room_number"]; ?>">
                                    </td>
                                </tr>

                            </table>

                            <div class="btn-group" role="group">
                                <a href="doctors_details.php?doctor_id=<?php echo $doctorId; ?>"
                                    class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    <?php else: ?>
                        <!-- View mode -->
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
                                <th>Password</th>
                                <td>
                                    <?php echo $doctor["password"]; ?>
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

                        </table>
                        <a href="doctors.php" class="btn btn-secondary">Return</a>
                        <a href="doctors_details.php?doctor_id=<?php echo $doctorId; ?>&edit=true" class="btn btn-primary">Edit</a>
                        <a class="btn button-delete" href="doctors_delete.php?doctor_id=<?php echo $doctorId; ?>"
                            role="button">Delete</a>
                    <?php endif; ?>
                </div>
            </div>
            <?php
        } else {
            echo "Doctor not found!";
        }
    } else {
        echo "Invalid doctor ID!";
    }
    ?>

    <script type="text/javascript">
        document.getElementById("profile_image").onchange = function () {
            document.getElementById("form").submit();
        };
    </script>

    <div>

        <?php

        include 'doctors_profile.php';

        ?>

    </div>

</body>

</html>