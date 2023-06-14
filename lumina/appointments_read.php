<?php
include 'db.php'; // Include your database connection file

// Retrieve all appointments from the appointments table, sorted by date in ascending order
$sql = "SELECT * FROM appointments ORDER BY date ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Appointments exist, display them
    echo '<div class="row row-cols-1 row-cols-md-3 g-4">';
    
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<div class="col">';
        echo '<div class="card">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row["name"] . ' ' . $row["surname"] . '</h5>';
        echo '<p class="card-text">Date: ' . $row["date"] . '</p>';
        
        // Format the time to display only the hour and minute
        $time = date("H:i", strtotime($row["time"]));
        echo '<p class="card-text">Time: ' . $time . '</p>';
        
        echo '<p class="card-text">Doctor ID: ' . $row["doctor_id"] . '</p>';
        echo '<a href="appointments_details.php?id=' . $row["appointment_id"] . '" class="btn btn-primary">View More</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    
    echo '</div>'; // Close the row
    
} else {
    // No appointments found
    echo '<div class="alert alert-info">No appointments found.</div>';
}

$conn->close();
?>
