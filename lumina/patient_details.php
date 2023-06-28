<!-- Patient Details Page -->
<!DOCTYPE html>
<html>

<head>
    <title>Patient Details</title>
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
    
    // Retrieve the patient ID from the query parameter
    if (isset($_GET['patients_id'])) {
        $patientId = $_GET['patients_id'];

        // Fetch the patient details from the database using the patient ID
        $sql = "SELECT * FROM patients WHERE patients_id = $patientId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Patient found, display the details
            $patient = $result->fetch_assoc();
            ?>
            <div class="card">
                <div class="card-body">
                    <?php if (isset($_GET['edit']) && $_GET['edit'] === 'true'): ?>
                        <!-- Edit form -->
                        <form class="edit-form" action="patient_update.php" method="POST">
                            <h5 class="card-title">Patient Details (Edit Mode)</h5>
                            <table class="table">
                                <tr>
                                    <th>Patient ID</th>
                                    <td>
                                        <?php echo $patient["patients_id"]; ?>
                                        <input type="hidden" name="patients_id" value="<?php echo $patient["patients_id"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>
                                        <input type="text" class="form-control" name="name" value="<?php echo $patient["name"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Surname</th>
                                    <td>
                                        <input type="text" class="form-control" name="surname"
                                            value="<?php echo $patient["surname"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Age</th>
                                    <td>
                                        <input type="number" class="form-control" name="age" value="<?php echo $patient["age"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>
                                        <select class="form-control" name="gender">
                                            <option value="male" <?php if ($patient["gender"] === "male")
                                                echo "selected"; ?>>Male
                                            </option>
                                            <option value="female" <?php if ($patient["gender"] === "female")
                                                echo "selected"; ?>>
                                                Female</option>
                                            <option value="other" <?php if ($patient["gender"] === "other")
                                                echo "selected"; ?>>Other
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Phone Number</th>
                                    <td>
                                        <input type="tel" class="form-control" name="phone_number"
                                            value="<?php echo $patient["phone_number"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>
                                        <input type="email" class="form-control" name="email"
                                            value="<?php echo $patient["email"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Medical Aid Number</th>
                                    <td>
                                        <input type="text" class="form-control" name="medicalaid_number"
                                            value="<?php echo $patient["medicalaid_number"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Previous Appointments</th>
                                    <td>
                                        <textarea class="form-control" name="previous_appointments"
                                            rows="5"><?php echo $patient["previous_appointments"]; ?></textarea>
                                    </td>
                                </tr>
                            </table>

                            <div class="btn-group" role="group">
                                <a href="patient_details.php?patients_id=<?php echo $patientId; ?>"
                                    class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    <?php else: ?>
                        <!-- View mode -->
                        <h5 class="card-title">Patient Details</h5>
                        <table class="table">
                            <tr>
                                <th>Patient ID</th>
                                <td>
                                    <?php echo $patient["patients_id"]; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>
                                    <?php echo $patient["name"]; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Surname</th>
                                <td>
                                    <?php echo $patient["surname"]; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Age</th>
                                <td>
                                    <?php echo $patient["age"]; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>
                                    <?php echo $patient["gender"]; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td>
                                    <?php echo $patient["phone_number"]; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>
                                    <?php echo $patient["email"]; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Medical Aid Number</th>
                                <td>
                                    <?php echo $patient["medicalaid_number"]; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Previous Appointments</th>
                                <td>
                                    <?php echo $patient["previous_appointments"]; ?>
                                </td>
                            </tr>
                        </table>
                        <a href="patient.php" class="btn btn-secondary">Return</a>
                        <a href="patient_details.php?patients_id=<?php echo $patientId; ?>&edit=true"
                            class="btn btn-primary">Edit</a>
                        <a class="btn button-delete" href="patient_delete.php?patients_id=<?php echo $patientId; ?>"
                            role="button">Delete</a>
                    <?php endif; ?>
                </div>
            </div>
            <?php
        } else {
            echo "Patient not found!";
        }
    } else {
        echo "Invalid patient ID!";
    }
    ?>



</body>

</html>