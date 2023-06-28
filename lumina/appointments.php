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
                                <a class="nav-link" style="background: #F7F7F7;box-shadow: inset -16px 0px 0px #5E56E5;"
                                    href="appointments.php">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="doctors.php">Doctors</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="receptionist.php">Receptionist</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="patient.php">Patients</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="position:relative; top: 400px; color:#5E56E5; "
                                    href="logout.php">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10">

                    <!-- Rest of your website content goes here -->

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
                        <br>
                        <h1>Appointments</h1>
                        <br>
                        <?php

                        include 'appointments_read.php';

                        ?>

                    </div>


                    <div>

                        <br><br><br>
                        <?php

                        include 'appointments_create.php';

                        ?>

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