<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Landing Page - Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-light bg-light static-top">
        <div class="container">
            <a class="navbar-brand" href="#!">Start Bootstrap</a>

            <div class="nav-link">
                <!-- Button trigger modal -->
                <a href="#signup" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Login">Login</a>
                <a class="btn btn-primary" href="#signup" data-bs-toggle="modal" data-bs-target="#Signup">Sign Up</a>
            </div>

        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="text-center text-white">
                        <!-- Page heading-->
                        <h1 class="mb-5">Generate more leads with a professional landing page!</h1>
                        <!-- Signup form-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form class="form-subscribe" id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Email address input-->
                            <div class="row">
                                <div class="col">
                                    <input class="form-control form-control-lg" id="emailAddress" type="email" placeholder="Email Address" data-sb-validations="required,email" />
                                    <div class="invalid-feedback text-white" data-sb-feedback="emailAddress:required">
                                        Email Address is required.</div>
                                    <div class="invalid-feedback text-white" data-sb-feedback="emailAddress:email">Email
                                        Address Email is not valid.</div>
                                </div>
                                <div class="col-auto"><button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button></div>
                            </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    <p>To activate this form, sign up at</p>
                                    <a class="text-white" href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage">
                                <div class="text-center text-danger mb-3">Error sending message!</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- popup section -->
    <section class="modal-wrap">
        <!-- Modal  login -->
        <div class="modal fade" id="Login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-wrap">
                            <form class="row g-3 needs-validation" id="loginForm" action="./controller/loginController.php" method="post">
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Username or Email Address</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="verify_name" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationDefaultpass" class="form-label">Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control" id="validationDefaultpass" aria-describedby="inputGroupPrepend2" required>
                                    </div>
                                    <div class="link-wrap d-flex justify-content-between ">
                                        <a href="#">Lost Password</a> <a href="#">Register</a>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                        <label class="form-check-label" for="invalidCheck">
                                            Remember me
                                        </label>
                                        <div class="invalid-feedback">
                                            You must agree before submitting.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal  Signup -->
        <div class="modal fade" id="Signup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Sign UP</h1>
                        <```javascript
<div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">Sign UP</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="form-wrap">
        <form class="row g-3 needs-validation" method="post" id="contactForm" action="./controller/registerController.php">
            <div class="col-md-12">
                <label for="validationCustom01" class="form-label">Name</label>
                <input type="text" class="form-control" id="validationCustom01" name="name" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-12">
                <label for="validationCustom01" class="form-label">First Name</label>
                <input type="text" class="form-control" id="validationCustom01" name="first_name" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-12">
                <label for="validationCustom01" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="validationCustom01" name="last_name" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-12">
                <label for="validationCustom06" class="form-label">Phone No.</label>
                <input type="number" class="form-control" id="validationCustom06" name="phone_no" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-12">
                <label for="validationCustom03" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="validationCustom03" name="email" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-12">
                <label for="validationDefaultpass" class="form-label">Choose a Password </label>
                <div class="input-group">
                    <input type="password" name="password" class="form-control" id="validationDefaultpass" aria-describedby="inputGroupPrepend2" required>
                </div>
            </div>
            <div class="col-md-12">
                <label for="validationDefaultpass" class="form-label">Confirm Password</label>
                <div class="input-group">
                    <input type="password" name="confirm_password" class="form-control" id="validationDefaultConfirmPass" aria-describedby="inputGroupPrepend2" required>
                </div>
                <div class="invalid-feedback" data-sb-feedback="validationDefaultpass:password">Passwords do not match</div>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        Agree to terms and conditions
                    </label>
                    <div class="invalid-feedback">
                        You must agree before submitting.
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Sign Up</button>
            </div>
        </form>
    </div>
</div>
