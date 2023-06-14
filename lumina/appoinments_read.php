<?php
include 'db.php'; // Include your database connection file

// Retrieve all appointments from the appointments table
$sql = "SELECT * FROM appointments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Appointments exist, display them
    echo "<table>";
    echo "<tr><th>Appointment ID</th><th>Name</th><th>Surname</th><th>Date</th><th>Time</th><th>Doctor ID</th><th>Receptionist ID</th><th>Medical Aid Number</th><th>Medical Fund</th><th>Description</th></tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["appointment_id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["surname"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>" . $row["time"] . "</td>";
        echo "<td>" . $row["doctor_id"] . "</td>";
        echo "<td>" . $row["receptionist_id"] . "</td>";
        echo "<td>" . $row["medicalaid_number"] . "</td>";
        echo "<td>" . $row["medicalfund"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    // No appointments found
    echo "No appointments found.";
}

$conn->close();
?>
