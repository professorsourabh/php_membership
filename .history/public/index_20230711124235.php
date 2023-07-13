<?php
session_start();
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assesment-Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link rel="stylesheet" href="index.css">
  </link>
</head>

<body>
  <header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">


        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-secondary ">Home</a></li>

        </ul>

        <div class="text-end">
          <a type="button" class="btn btn-outline-light me-2" href="login.php">Login</a>
          <a type="button" class="btn btn-warning" href="index.php">Sign-up</a>
        </div>
      </div>
    </div>
  </header>
  <div class="container my-4 col-lg-6">
    <div class="card my-4" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
      <div class="card-heading text-center my-3 mx-2">
        <h2 class="text-uppercase fw-bold">Register</h2>
      </div>
      <div class="card-body">
        <?php if (!empty($_SESSION['error_msg'])) { ?>
          <div class="error">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['error_msg']; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>
        <?php
          unset($_SESSION['error_msg']);
        } ?>
        <?php if (!empty($_SESSION['success_msg'])) { ?>
          <div class="error">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['success_msg']; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>
        <?php
          unset($_SESSION['success_msg']);
        } ?>

        <form method="post" action="./controller/registerController.php">
          <div class="form-group">
            <label for="exampleInputusername">User Name</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Enter User Name">
          </div>

          <div class="form-group">
            <label for="exampleInputfirst_name">First Name</label>
            <input type="text" class="form-control" name="firstname" id="first_name" placeholder="First Name">
          </div>
          <div class="form-group">
            <label for="exampleInputlast_name">Last Name</label>
            <input type="text" name="lastname" class="form-control" id="last_name" placeholder="Last Name">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">

          </div>

          <div class="form-group">
            <label for="exampleInputPassword">Password</label>
            <div class="input-group">
              <input type="password" class="form-control" name="password" id="exampleInputPassword" placeholder="Password">
              <div class="input-group-append">
                <span class="input-group-text eye-icon" onclick="togglePasswordVisibility(this, 'exampleInputPassword')">
                  <i class="fas fa-eye"></i>
                </span>
              </div>
            </div>
          </div>




          <button type="submit" class="btn btn-primary my-4">Submit</button>
        </form>

      </div>
    </div>

  </div>







  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="./public/project.js">

  </script>
</body>

</html>