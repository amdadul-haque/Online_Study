<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign UP</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
  <?php include 'navbar.php' ?>

  <?php

  if (isset($_REQUEST['signupSubmit'])) {

    $user_name = $_POST['signupName'];
    $user_email = $_POST['signupEmail'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupcPassword'];

    // echo 'email: ' . $user_email . ' password: ' . $pass . '<br>';

    include 'db_conn.php';

    // Check whether this email exists
    $existSql = "select * from users where email = '$user_email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
      echo '<div class="text-center alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Email Already Exists!</strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    } else {
      if ($pass == $cpass) {

        // $hash = password_hash($pass, PASSWORD_DEFAULT);

        $sql = "INSERT INTO `users` (`name`, `email`, `password`) VALUES ( '$user_name','$user_email', '$pass')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
          // echo '<h1>Done</h1>';
          echo '<div class="text-center alert alert-success alert-dismissible fade show" role="alert">
          <strong>Signup complete, Now you can log in!</strong> 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
          // header('Location: login.php');
          exit();
        }
      } else {
        // echo '<h1>Failed to signup</h1>';
        echo '<div class="text-center alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Confirm Password not matched</strong> 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
      }
    }
  }
  ?>

  <div class="container my-5">
    <div class="row d-flex">

      <form class="col border shadow d-flex flex-column justify-content-center" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="mb-3">
          <label for="signupName" class="form-label">Full Name</label>
          <input type="text" class="form-control" id="signupName" name="signupName" placeholder="Enter your full name" required />
        </div>

        <div class="mb-3">
          <label for="signupEmail" class="form-label">Email address</label>
          <input type="email" class="form-control" id="signupEmail" name="signupEmail" placeholder="Enter your email" required />
        </div>

        <div class="mb-3">
          <label for="signupPassword" class="form-label"> Password</label>
          <input type="password" class="form-control" id="signupPassword" name="signupPassword" placeholder="Password" required />
        </div>

        <div class="mb-3">
          <label for="signupcPassword" class="form-label">Confirm Password</label>
          <input type="password" class="form-control" id="signupcPassword" name="signupcPassword" placeholder="Cofirm Password" required />
        </div>

        <input type="submit" name="signupSubmit" class="btn btn-danger" value="SIGN UP">
      </form>

      <div class="col">
        <img class="img-fluid" src="./img/signup.jpg" alt="">
      </div>

    </div>
  </div>
  
  <?php include 'footer.php' ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>