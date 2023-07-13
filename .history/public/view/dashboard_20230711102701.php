<?php
session_start();
include_once('../../config_file.php');
if (isset($_SESSION['id'])) {

  extract($_SESSION);
?>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assesment-Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    
    </link>
  </head>

  <body>
    <header class="p-3 bg-dark text-white">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

        <?php if (!empty($_SESSION['msg'])) { ?>
        <div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="d-flex">
            <div class="toast-body">
            <?php echo $_SESSION['msg']; ?>
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
        </div>
        <?php 
      unset($_SESSION['msg']);
      } ?>

          <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
          </ul>
          <h2 style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" class="mx-4">Hi <?php echo ($userData['name']); ?></h2>
          <div class="dropdown" style="display: flex; align-items: center;">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-cog" aria-hidden="true"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
              <a href="#signup" class="btn btn-white mx-2 my-2" data-bs-toggle="modal" data-bs-target="#Signup">Edit Profile</a>
              <a type="button" class="btn btn-danger mx-2 my-2" href="../../controller/logoutController.php">Logout</a>

            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="modal fade" id="Signup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Update</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-wrap">
              <form class="row g-3 needs-validation" method="post" action="../../controller/userController.php">
                <input type="text" class="form-control" name="id" id="validationCustom01" value="<?php echo base64_encode($userData['id']); ?>" readonly hidden>
                <div class="col-md-12">
                  <label for="validationCustom01" class="form-label">User Name</label>
                  <input type="text" class="form-control" id="name" value="<?php echo $userData['name']; ?>" readonly>

                </div>
                <div class="col-md-12">
                  <label for="validationCustom01" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="first_name" value="<?php echo $userData['first_name']; ?>" name="first_name" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="validationCustom01" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $userData['last_name']; ?>" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="validationCustom06" class="form-label">Phone No.</label>
                  <input type="text" class="form-control" id="phone_no" name="phone_no" value=<?php echo $userData['phone_no']; ?> required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="validationCustom03" class="form-label">Email Address</label>
                  <input type="email" class="form-control" id="email" name="email" value=<?php echo $userData['email']; ?> required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>


                <div class="col-md-12">
                  <label for="exampleInputPassword">Update Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" value="<?php echo $userData['password']; ?>" name="password" id="exampleInputPassword" placeholder="Password">
                    <div class="input-group-append">
                      <span class="input-group-text eye-icon" style=" height: 39px;" onclick="togglePasswordVisibility(this, 'exampleInputPassword')">
                        <i class="fas fa-eye"></i>
                      </span>
                    </div>
                  </div>
                </div>




                <div class="col-12">
                  <button class="btn btn-primary" type="submit">Update</button>
                </div>
              </form>
            </div>
          </div>
        
        </div>
      </div>
    </div>

    <div class="container my-4 col-lg-8">
      <div class="card my-4" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
     
        <div class="card-heading text-center my-3 mx-2">
          <h2 class="text-uppercase fw-bold">Profile</h2>
        </div>
      

        <section class="col-lg-12" style="background-color: #f4f5f7;">
          <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col col-lg-6 mb-4 mb-lg-0">
                <div class="card mb-3" style="border-radius: 1rem;">
                  <div class="row g-0">

                    <div class="col-md-12">
                      <div class="card-body p-4">
                        <h6>Information</h6>
                        <hr class="mt-0 mb-4">
                        <div class="row pt-1">
                          <div class="col-4 mb-3">
                            <h6>Username</h6>
                            <p class="text-muted"><?php echo ($userData['name']); ?></p>
                          </div>
                          <div class="col-4 mb-3">
                            <h6>Email</h6>
                            <p class="text-muted"><?php echo $userData['email']; ?></p>
                          </div>
                          <div class="col-4 mb-3">
                            <h6>Password</h6>
                            <p class="text-muted"><?php echo $userData['password']; ?></p>
                          </div>
                        </div>

                        <hr class="mt-0 mb-4">
                        <div class="row pt-1">
                          <div class="col-4 mb-3">
                            <h6>First Name</h6>
                            <p class="text-muted"><?php echo $userData['first_name']; ?></p>
                          </div>
                          <div class="col-4 mb-3">
                            <h6>Last Name</h6>
                            <p class="text-muted"><?php echo $userData['last_name']; ?></p>
                          </div>

                        </div>

                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
        </section>

      </div>
    </div>

    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="../project.js"></script>
  </body>

  </html>

<?php

} else {
  session_unset();
  header("location:../login.php");
}

?>