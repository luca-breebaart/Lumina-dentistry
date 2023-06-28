<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Page</title>

    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
    <!-- Custom CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>


<body>

    <?php
    session_start();

    if (isset($_SESSION['receptionists_id']) && isset($_SESSION['name'])) {

        ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <div class="navigation">
                        <div class="logo-center">
                            <div class="logo-section">
                                <img class="logo-container" src="images\Logo2.png" alt="Logo">

                                <div class="text-container">
                                    <p class="logo-name">Lumina</p>
                                    <p class="logo-subtitle">Dentistry</p>
                                </div>
                            </div>
                        </div>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="appointments.php">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="doctors.php">Doctors</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="receptionist.php">Receptionist</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="background: #F7F7F7;box-shadow: inset -16px 0px 0px #5E56E5;"
                                    href="patient.php">Patients</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="position:relative; top: 400px; color:#5E56E5; "
                                 href="logout.php">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10">

                    <div class="profile">
                        <!-- Profile card -->
                        <div class="profile-card text-end">
                            <img class="profile-image" src="<?php echo $_SESSION['profile_image']; ?>" alt="Profile Image">
                            <div class="profile-info">
                                <h3 class="profile-name">
                                    <?php echo $_SESSION['name']; ?>
                                    <?php echo $_SESSION['surname']; ?>
                                </h3>
                                <p class="receptionist-id">Receptionist ID:
                                    <?php echo $_SESSION['receptionists_id']; ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h1> Patients: </h1>

                        <div class="container">
                            <div class="row">

                                <?php

                                include 'patient_read.php';

                                ?>

                            </div>
                        </div>
                    </div>

                    <br><br><br>
                    <h2>Patient Details Form</h2>
                    <br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPatientModal">
                        Add New Patient
                    </button>

                    <!-- Add Patient Modal -->
                    <div class="modal fade" id="addPatientModal" tabindex="-1" role="dialog"
                        aria-labelledby="addPatientModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addPatientModalLabel">Add New Patient</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="m-2" action="patient_create.php" enctype="multipart/form-data"
                                        method="POST">
                                        <div class="form-group">
                                            <label for="name">Name:</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Enter name">
                                        </div>
                                        <div class="form-group">
                                            <label for="surname">Surname:</label>
                                            <input type="text" class="form-control" id="surname" name="surname"
                                                placeholder="Enter surname">
                                        </div>
                                        <div class="form-group">
                                            <label for="age">Age:</label>
                                            <input type="text" class="form-control" id="age" name="age"
                                                placeholder="Enter Age">
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Gender:</label>
                                            <select class="form-control" id="gender" name="gender">
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone_number">Phone Number:</label>
                                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                                placeholder="Enter Phone Number">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="text" class="form-control" id="email" name="email"
                                                placeholder="Enter Email">
                                        </div>

                                        <div class="form-group">
                                            <label for="medicalaid_number">Medical Aid Number:</label>
                                            <input type="text" class="form-control" id="medicalaid_number"
                                                name="medicalaid_number" placeholder="Enter Medical Aid Number">
                                        </div>


                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
        </div>

        <?php
    } else {
        header("Location: login.php");
        exit();
    }
    ?>


</body>

</html>