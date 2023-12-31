<head>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
    <!-- Custom CSS -->
</head>

<?php

include 'db.php';

error_reporting(0);



// Retrieve data from the doctors table
$sql = "SELECT * FROM doctors";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    // Display data in cards
    displayDoctorCard($row);
}

$conn->close();

function displayDoctorCard($row)
{
    ?>
    <div class="card shadow rounded m-3" style="width: 18rem;">
        <div class="card-body d-flex flex-column">
            <div class="upload">
                <img src="images/doctors_images/<?php echo $row['profile_image']; ?>" class="img-fluid rounded-circle"
                    alt="profile_image" title="<?php echo $row['profile_image']; ?>">
            </div>
            <h5 class="card-title">
                <?php echo $row['name'] . ' ' . $row['surname']; ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">ID number:
                <?php echo $row['doctor_id']; ?>
            </h6>
            <br>
            <p class="card-text">Specialisation:
                <?php echo $row['specialisation']; ?>
            </p>
            <p class="card-text">Room Number:
                <?php echo $row['room_number']; ?>
            </p>
            <p class="card-text">Email:
                <?php echo $row['email']; ?>
            </p>
            <p class="card-text">Phone Number:
                <?php echo $row['phone_number']; ?>
            </p>

            <div class="mt-auto">
                <a class="btn btn-primary" href="doctors_details.php?doctor_id=<?php echo $row['doctor_id']; ?>"
                    role="button">View</a>
            </div>
            

        </div>

    </div>

<?php } ?>