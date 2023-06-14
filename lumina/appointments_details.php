<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<?php
include 'db.php'; // Include your database connection file

// Retrieve the appointment ID from the query parameter
if (isset($_GET['id'])) {
    $appointmentId = $_GET['id'];

    // Fetch the appointment details from the database using the appointment ID
    $sql = "SELECT * FROM appointments WHERE appointment_id = $appointmentId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Appointment found, display the details
        $appointment = $result->fetch_assoc();
        ?>
        
        <title>Appointment Details</title>
        
        <style>
            .card {
                max-width: 400px;
                margin: 0 auto;
                margin-top: 50px;
            }
        </style>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Appointment Details</h5>
                <table class="table">
                    <tr>
                        <th>Appointment ID</th>
                        <td>
                            <?php echo $appointment["appointment_id"]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>
                            <?php echo $appointment["name"]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Surname</th>
                        <td>
                            <?php echo $appointment["surname"]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td>
                            <?php echo $appointment["date"]; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Time</th>
                        <td>
                            <?php echo date("h:i A", strtotime($appointment["time"])); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Doctor ID</th>
                        <td>
                            <?php echo $appointment["doctor_id"]; ?>
                        </td>
                    </tr>
                    <!-- Include other appointment details here -->
                </table>
                <a href="index.php" class="btn btn-primary">Return</a>
            </div>
        </div>


        <?php
    } else {
        // Appointment not found
        echo '<div class="alert alert-info">Appointment not found.</div>';
    }
} else {
    // Invalid or missing appointment ID
    echo '<div class="alert alert-danger">Invalid appointment ID.</div>';
}

$conn->close();
?>