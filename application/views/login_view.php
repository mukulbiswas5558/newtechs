<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Application Login</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/dist/img/web_logo.png" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'IBM Plex Sans', sans-serif;
            background-color: #f7f7f7;
        }
        .navbar {
            background-color: #6739b7;
        }
        .navbar-brand h4 {
            color: white;
            font-weight: bold;
        }
        .nav-link {
            color: white !important;
        }
        .login-form-container {
            margin-top: 100px;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .form-control {
            border-radius: 0.5rem;
        }
        .btn-login {
            background-color: #6739b7;
            color: white;
            font-weight: bold;
            border-radius: 0.5rem;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url(); ?>Login">
                <h4><i class="fa fa-user-plus"></i> Tech Application</h4>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>Login">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>AboutUs">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>Contact">CONTACT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Login Form -->
    <div class="container d-flex justify-content-center">
        <div class="col-md-6 login-form-container">
            <h3 class="text-center">Login</h3>
            <form id="loginForm">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
                    <div class="invalid-feedback" id="usernameError"></div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                    <div class="invalid-feedback" id="passwordError"></div>
                </div>
                <button type="submit" class="btn btn-login btn-block">Login</button>
                <div class="text-center mt-3">
                    <a href="<?php echo base_url(); ?>PatientLogin" class="text-muted">Forgot Password?</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $("#loginForm").on("submit", function (e) {
                e.preventDefault(); // Prevent default form submission
                $(".is-invalid").removeClass("is-invalid"); // Reset error styles
                $(".invalid-feedback").text(""); // Reset error messages

                let username = $("#username").val().trim();
                let password = $("#password").val().trim();
                let hasError = false;

                // Front-end validation
                if (username === "") {
                    $("#username").addClass("is-invalid");
                    $("#usernameError").text("Username is required.");
                    hasError = true;
                }
                if (password === "") {
                    $("#password").addClass("is-invalid");
                    $("#passwordError").text("Password is required.");
                    hasError = true;
                }

                if (hasError) {
                    return; // Stop if there are validation errors
                }

                // Submit form data via AJAX
                $.ajax({
                    url: "<?php echo base_url(); ?>verifylogin", // URL to send the form data
                    type: "POST",
                    data: $('#loginForm').serialize(), // Serialize the form data
                    success: function (response) {
                        let result = JSON.parse(response); // Parse the JSON response from the backend
                        if (result.success) {
                            // Show SweetAlert on success
                            Swal.fire({
                                title: "Login Successful!",
                                text: "redirected.",
                                icon: "success",
                                timer: 1000, // Automatically close after 3 seconds
                                showConfirmButton: false // Hides the confirm button
                            }).then(() => {
                                window.location.href = result.redirect_url; // Redirect to the given URL
                            });
                        } else {
                            // Handle errors returned by the server
                            if (result.errors.username) {
                                $("#username").addClass("is-invalid");
                                $("#usernameError").text(result.errors.username);
                            }
                            if (result.errors.password) {
                                $("#password").addClass("is-invalid");
                                $("#passwordError").text(result.errors.password);
                            }
                            Swal.fire({
                                title: "Login Failed!",
                                text: "Please check your input and try again.",
                                icon: "error",
                                confirmButtonText: "OK"
                            });
                        }
                    },
                    error: function () {
                        // Handle unexpected errors (e.g., server issues)
                        Swal.fire({
                            title: "Error!",
                            text: "There was an issue with your request. Please try again later.",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>
