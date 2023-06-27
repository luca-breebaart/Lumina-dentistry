<!-- patients_read.php -->
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
    <!-- Custom CSS -->
    <style>
        .table-container {
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <?php
    include 'db.php';

    // Retrieve data from the patients table and sort by ID
    $sql = "SELECT * FROM patients ORDER BY patients_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        ?>
        <div class="container table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Age</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Medical Aid Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row['patients_id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['surname']; ?></td>
                            <td><?php echo $row['age']; ?></td>
                            <td><?php echo $row['phone_number']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['medicalaid_number']; ?></td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="patient_details.php?patients_id=<?php echo $row['patients_id']; ?>" role="button">View</a>
                                <!-- Add additional buttons for edit, delete, etc. -->
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
    } else {
        echo "<div class='container mt-4'>No patients found!</div>";
    }

    $conn->close();
    ?>
</body>

</html>
