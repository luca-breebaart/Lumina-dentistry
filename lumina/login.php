<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
            <div class="col-md-6">
                <div class="image-container">
                    <img class="login_image2" src="images/darkblue_shape.svg">
                    <img class="login_image1" src="images/lightblue_shape.svg">
                </div>
            </div>

            <div class="col-md-4">

                <div class="custom">

                    <div class="logo-center">
                        <div class="logo-section">
                            <img class="logo-container" src="images\Logo2.png" alt="Logo">

                            <div class="text-container">
                                <h3 class="logo-name">Lumina</h3>
                                <p class="logo-subtitle">Dentistry</p>
                            </div>
                        </div>
                    </div>

                    <div class="custom-header">
                        <h3 class="text-center">Login</h3>
                    </div>
                    <div class="custom-body">
                        <form>
                            <div class="mb-4">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter your username">
                            </div>
                            <div class="mb-5">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password"
                                    placeholder="Enter your password">
                            </div>
                            <div class="text-center">
                                <button type="submit" style="width: 50%;" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</body>

</html>