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
    <div class="card shadow rounded m-3 " style="width: 18rem;">
        <div class="card-body mx-auto">
            <?php if ($row['doctor_id'] == $_GET['doctor_id']): ?>
                <form class="form-inline m-2" id="form" action="" enctype="multipart/form-data" method="post">
                    <div class="upload">
                        <?php
                        $doctor_id = $row["doctor_id"];
                        $name = $row["name"];
                        $profile_image = $row["profile_image"];
                        ?>
                        <label for="Picture">Profile Image:</label>
                        <!-- image  -->
                        <img src="images/doctors_images/<?php echo $profile_image; ?>" class="img-fluid rounded-circle"
                            alt="profile_image" title="<?php echo $profile_image; ?>">

                        <div class="round">
                            <input type="hidden" name="doctor_id" value="<?php echo $doctor_id; ?>">
                            <input type="hidden" name="name" value="<?php echo $name; ?>">
                            <br>
                            <input type="file" class="form-control-file" id="profile_image" name="profile_image"
                                accept=".jpg, .jpeg, .png">
                        </div>
                    </div>
                </form>
                <form class="form-inline m-2" action="doctors_update.php" method="POST">
                    <label for="Name">Name:</label>
                    <h5 class="card-title"><input type="text" class="form-control" name="name"
                            value="<?php echo $row['name']; ?>"></h5>
                    <label for="Surname">Surname:</label>
                    <h5 class="card-title"><input type="text" class="form-control" name="surname"
                            value="<?php echo $row['surname']; ?>"></h5>
                    <div class="btn-group" role="group" aria-label="Actions">
                        <a class="btn btn-danger" href="doctors.php" role="button">Cancel</a>
                        <td><button type="submit" class="btn btn-success">Save</button></td>
                        <input type="hidden" name="doctor_id" value="<?php echo $row['doctor_id']; ?>">
                    </div>
                </form>
            <?php else: ?>
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

                <div class="btn-group" role="group">
                    <a class="btn btn-custom-edit" href="doctors.php?doctor_id=<?php echo $row['doctor_id']; ?>"
                        role="button">Edit</a>
                    <a class="btn btn-custom-view" href="doctors_details.php?doctor_id=<?php echo $row['doctor_id']; ?>"
                        role="button">View</a>
                    <a class="btn button-delete" href="doctors_delete.php?doctor_id=<?php echo $row['doctor_id']; ?>"
                        role="button">Delete</a>
                </div>

                <script>
                    window.addEventListener("beforeunload", function () {
                        localStorage.setItem("scrollPos", window.pageYOffset);
                    });

                    window.addEventListener("load", function () {
                        var scrollPos = localStorage.getItem("scrollPos");
                        if (scrollPos) {
                            window.scrollTo(0, scrollPos);
                            localStorage.removeItem("scrollPos");
                        }
                    });
                </script>
            <?php endif; ?>
        </div>

    </div>
<?php } ?>