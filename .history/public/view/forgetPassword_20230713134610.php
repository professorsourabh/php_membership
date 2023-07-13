<?php

session_start();
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../../css/styles.css" rel="stylesheet" />
    <link href="../index.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-light bg-light static-top">
        <div class="container">
            <a class="navbar-brand" href="#!">Start Bootstrap</a>



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

                        <a href="#forgetPassword" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#forgetPassword">Click Here to Change Your Password</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- popup section -->
    <section class="modal-wrap">
        <!-- Modal  login -->
        <div class="modal fade" id="forgetPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Forget Password </h1>



                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-wrap">
                            <form class="row g-3 needs-validation" id="loginForm" action="../../controller/verificationController.php" method="post">

                            <?php $id=base64_encode($_SESSION['id']); ?>
                            <input type="text" value="<?php echo $id; ?>" name="id" hidden>
                                <div class="form-group">
                                    <label for="exampleInputPassword">Password</label>
                                    <div class="input-group align-items-center">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" style="line-height: 1;">
                                        <span class="input-group-text eye-icon" onclick="togglePasswordVisibility(this, 'password')" style="height: 45px;">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </div>
                                </div>




                                <div class="form-group">
                                    <label for="exampleInputPassword">Confirm Password</label>
                                    <div class="input-group align-items-center">
                                        <input type="password" class="form-control" name="confirm_password" id="ConfirmPassword" placeholder="confirm password" style="line-height: 1;">
                                        <span class="input-group-text eye-icon" onclick="togglePasswordVisibility(this, 'ConfirmPassword')" style="height: 45px;">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Change</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <!-- Footer-->
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item"><a href="#!">About</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="#!">Contact</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="#!">Terms of Use</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="#!">Privacy Policy</a></li>
                    </ul>
                    <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2023. All Rights Reserved.</p>
                </div>
                <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item me-4">
                            <a href="#!"><i class="bi-facebook fs-3"></i></a>
                        </li>
                        <li class="list-inline-item me-4">
                            <a href="#!"><i class="bi-twitter fs-3"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!"><i class="bi-instagram fs-3"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    
    <script src="../project.js"></script>
    <script>
        function togglePasswordVisibility(icon, inputId) {
    const passwordInput = document.getElementById(inputId);

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.innerHTML = '<i class="fas fa-eye-slash"></i>';
    } else {
        passwordInput.type = "password";
        icon.innerHTML = '<i class="fas fa-eye"></i>';
    }
}

            </script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
<?php } else {
    $nameError = '';
}?>