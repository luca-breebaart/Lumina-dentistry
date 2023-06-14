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
                            <a class="nav-link" href="index.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="doctors.php">Doctors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" 
                            style="background: #F7F7F7;box-shadow: inset -16px 0px 0px #5E56E5;"
                            href="receptionist.php">Receptionist</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Patients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10">

                <!-- Rest of your website content goes here -->

                <div class="profile">
                    <!-- Profile card -->
                    <div class="profile-card text-end">
                        <img class="profile-image" src="images\Headshot.jpg" alt="Profile Image">
                        <div class="profile-info">
                            <h3 class="profile-name">John Doe</h3>
                            <p class="receptionist-id">Receptionist ID: ABC123</p>
                        </div>
                    </div>
                </div>

                <div>
                    <h1> Reveptionists:</h1>

                    <div class="container">
                        <div class="row">

                            <?php

                            include 'receptionist_read.php';

                            ?>

                        </div>
                    </div>
                </div>

                <!-- <div class="container">
                    <h2>Employee Details Form</h2>
                    <form class="m-2" action="doctors_create.php" enctype="multipart/form-data" method="POST">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="surname">Surname:</label>
                            <input type="text" class="form-control" id="surname" name="surname"
                                placeholder="Enter surname">
                        </div>
                        <div class="form-group">
                            <label for="age">Age:</label>
                            <input type="text" class="form-control" id="age" name="age" placeholder="Enter Age">
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
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="text" class="form-control" id="password" name="password"
                                placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label for="specialisation">Specialisation:</label>
                            <input type="text" class="form-control" id="specialisation" name="specialisation"
                                placeholder="Enter Specialisation">
                        </div>
                        <div class="form-group">
                            <label for="room_number">Room Number:</label>
                            <input type="text" class="form-control" id="room_number" name="room_number"
                                placeholder="Enter Room Number">
                        </div>
                        <div class="form-group">
                            <label for="profile_image">Profile Image:</label>
                            <input type="file" class="form-control-file" id="profile_image" name="profile_image"
                                accept=".jpg, .jpeg, .png">
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div> -->


            </div>
        </div>
    </div>

    <script type="text/javascript">
        document.getElementById("profile_image").onchange = function () {
            document.getElementById("form").submit();
        };
    </script>
    
    <div>

        <?php

        include 'receptionist_profile.php';

        ?>

    </div>


</body>

</html>