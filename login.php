<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
  <?php include 'navbar.php' ?>

  <?php

  if (!empty($_POST["remember"])) {
    setcookie("loginEmail", $_POST["loginEmail"], time() + 3600);
    setcookie("loginPassword", $_POST["loginPassword"], time() + 3600);
    // echo "Cookies Set Successfuly";
  } else {
    setcookie("loginEmail", "");
    setcookie("loginPassword", "");
    // echo "Cookies Not Set";
  }

  if (isset($_REQUEST['loginSubmit'])) {

    $login_email = $_POST['loginEmail'];
    $login_password = $_POST['loginPassword'];

    include 'db_conn.php';
    $sql1 = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql1);
    $resultCheck = mysqli_num_rows($result);

    $cnt = 0;
    while ($rows = mysqli_fetch_array($result)) {
      $email = $rows['email'];
      $pass = $rows['password'];
      $admin = $rows['admin'];
      $user_name = $rows['name'];
      $id = $rows['id'];

      if ($email == $login_email && $pass = $login_password) {
        $cnt++;
        break;
      }
    }
    if ($cnt && $admin != 0) {
      header('Location: admin.php');
    } else if ($cnt && $admin == 0) {

      // session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['user_name'] = $user_name;
      $_SESSION['id'] = $id;

      header('Location: index.php');
    } else {
      echo '<div class="text-center alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Wrong email or password!</strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
      $_SESSION['loggedin'] = false;
    }
  }
  ?>

  <div class="container my-5">
    <div class="row d-flex align-items-center justify-content-center">
      <form style="height: 300px;" class="col border shadow d-flex flex-column justify-content-center" action="login.php" method="post">

        <div class="mb-3">
          <label for="loginEmail" class="form-label">Email Address</label>
          <input type="email" class="form-control" id="loginEmail" name="loginEmail" value="<?php if (isset($_COOKIE["loginEmail"])) {
                                                                                              echo $_COOKIE["loginEmail"];
                                                                                            } ?>" placeholder="Enter your email address" required />
        </div>

        <div class="mb-3">
          <label for="loginPassword" class="form-label">Password</label>
          <input type="password" class="form-control" id="loginPassword" name="loginPassword" value="<?php if (isset($_COOKIE["loginPassword"])) {
                                                                                                        echo $_COOKIE["loginPassword"];
                                                                                                      } ?>" placeholder="Enter your loginPassword" required />
        </div>
        <div class="mb-3 d-flex justify-content-between px-2">
          <div>
            <input type="checkbox" name="remember"> Remember Me
          </div>
          <div>
            Not Account? <a href="signup.php">Sign Up</a>
          </div>
        </div>
        <input type="submit" name="loginSubmit" class="btn btn-primary" value="LOGIN">

      </form>

      <div class="col">
        <img class="img-fluid" src="./img/login.jpg" alt="">
      </div>
    </div>
  </div>

  <?php include 'footer.php' ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>

</html>