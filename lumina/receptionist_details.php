<!-- Receptionist Details Page -->
<!DOCTYPE html>
<html>

<head>
    <title>Receptionist Details</title>
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
    
    // Retrieve the receptionist ID from the query parameter
    if (isset($_GET['receptionists_id'])) {
        $receptionists_id = $_GET['receptionists_id'];

        // Fetch the receptionist details from the database using the receptionist ID
        $sql = "SELECT * FROM receptionists WHERE receptionists_id = $receptionists_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Receptionist found, display the details
            $receptionist = $result->fetch_assoc();
            ?>
            <div class="card">
                <img src="images/receptionist_images/<?php echo $receptionist['profile_image']; ?>" class="details-image"
                    alt="Profile Image">
                <div class="card-body">
                    <?php if (isset($_GET['edit']) && $_GET['edit'] === 'true'): ?>
                        <!-- Edit form -->

                        <form class="form-inline m-2" id="form" action="" enctype="multipart/form-data" method="post">

                            <div class="upload">
                                <?php
                                $receptionists_id = $receptionist["receptionists_id"];
                                $name = $receptionist["name"];
                                $profile_image = $receptionist["profile_image"];
                                ?>

                                <div class="round">
                                    <input type="hidden" name="receptionists_id" value="<?php echo $receptionists_id; ?>">
                                    <input type="hidden" name="name" value="<?php echo $name; ?>">

                                    <input type="file" class="form-control-file" id="profile_image" name="profile_image"
                                        accept=".jpg, .jpeg, .png">
                                </div>
                            </div>

                        </form>

                        <form class="edit-form" action="receptionist_update.php" method="POST" enctype="multipart/form-data">
                            <h5 class="card-title">Receptionist Details (Edit Mode)</h5>
                            <table class="table">
                                <tr>
                                    <th>Receptionist ID</th>
                                    <td>
                                        <?php echo $receptionist["receptionists_id"]; ?>
                                        <input type="hidden" name="receptionists_id"
                                            value="<?php echo $receptionist["receptionists_id"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>
                                        <input type="text" class="form-control" name="name"
                                            value="<?php echo $receptionist["name"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Surname</th>
                                    <td>
                                        <input type="text" class="form-control" name="surname"
                                            value="<?php echo $receptionist["surname"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Age</th>
                                    <td>
                                        <input type="number" class="form-control" name="age"
                                            value="<?php echo $receptionist["age"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>
                                        <select class="form-control" name="gender">
                                            <option value="male" <?php if ($receptionist["gender"] === "male")
                                                echo "selected"; ?>>Male
                                            </option>
                                            <option value="female" <?php if ($receptionist["gender"] === "female")
                                                echo "selected"; ?>>
                                                Female</option>
                                            <option value="other" <?php if ($receptionist["gender"] === "other")
                                                echo "selected"; ?>>Other
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Phone Number</th>
                                    <td>
                                        <input type="tel" class="form-control" name="phone_number"
                                            value="<?php echo $receptionist["phone_number"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>
                                        <input type="email" class="form-control" name="email"
                                            value="<?php echo $receptionist["email"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Password</th>
                                    <td>
                                        <input type="text" class="form-control" name="password"
                                            value="<?php echo $receptionist["password"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Rank</th>
                                    <td>
                                        <input type="text" class="form-control" name="rank"
                                            value="<?php echo $receptionist["rank"]; ?>">
                                    </td>
                                </tr>
                            </table>

                            <div class="btn-group" role="group">
                                <a href="receptionist_details.php?receptionists_id=<?php echo $receptionists_id; ?>"
                                    class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    <?php else: ?>
                        <!-- View mode -->
                        <h5 class="card-title">Receptionist Details</h5>
                        <table class="table">
                            <tr>
                                <th>Receptionist ID</th>
                                <td>
                                    <?php echo $receptionist["receptionists_id"]; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>
                                    <?php echo $receptionist["name"]; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Surname</th>
                                <td>
                                    <?php echo $receptionist["surname"]; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Age</th>
                                <td>
                                    <?php echo $receptionist["age"]; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>
                                    <?php echo $receptionist["gender"]; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td>
                                    <?php echo $receptionist["phone_number"]; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>
                                    <?php echo $receptionist["email"]; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Password</th>
                                <td>
                                    <?php echo $receptionist["password"]; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Rank</th>
                                <td>
                                    <?php echo $receptionist["rank"]; ?>
                                </td>
                            </tr>
                        </table>
                        <a href="receptionist.php" class="btn btn-secondary">Return</a>
                        <a href="receptionist_details.php?receptionists_id=<?php echo $receptionists_id; ?>&edit=true"
                            class="btn btn-primary">Edit</a>
                        <a class="btn button-delete"
                            href="receptionist_delete.php?receptionists_id=<?php echo $receptionists_id; ?>"
                            role="button">Delete</a>
                    <?php endif; ?>
                </div>
            </div>
            <?php
        } else {
            echo "Receptionist not found!";
        }
    } else {
        echo "Invalid receptionist ID!";
    }
    ?>

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