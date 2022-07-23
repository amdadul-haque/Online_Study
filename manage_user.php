<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

  <?php include 'admin_nav.php'; ?>

  <div class="container bg-white my-5 p-5 rounded">
    <h2 class="mb-2">Current Users</h2>

    <?php
    if (isset($_REQUEST['addUserSubmit'])) {

      $user_name = $_POST['signupName'];
      $user_email = $_POST['signupEmail'];
      $pass = $_POST['signupPassword'];
      $cpass = $_POST['signupcPassword'];

      include 'db_conn.php';

      // Check whether this email exists
      $existSql = "select * from users where email = '$user_email'";
      $result = mysqli_query($conn, $existSql);
      $numRows = mysqli_num_rows($result);
      if ($numRows > 0) {
        echo '<div class="text-center alert alert-danger alert-dismissible fade show" role="alert">
          <strong>User Exists!</strong> 
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      } else {
        if ($pass == $cpass) {

          $sql = "INSERT INTO `users` (`name`, `email`, `password`) VALUES ( '$user_name','$user_email', '$pass')";
          $result = mysqli_query($conn, $sql);

          if ($result) {
            echo '<div class="text-center alert alert-success alert-dismissible fade show" role="alert">
              <strong>User Added</strong> 
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            exit();
          }
        } else {
          echo '<div class="text-center alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Confirm Password not matched</strong> 
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        }
      }
    }
    ?>
    <!-- DELETING and SHOWING USERS -->
    <?php
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $sql = "DELETE FROM `users` WHERE id = '$id' ";
      $result = mysqli_query($conn, $sql);
    }

    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    $sl = 1;
    while ($rows = mysqli_fetch_array($result)) {
      $id = $rows['id'];
      $user_name = $rows['name'];
      $is_admin = $rows['admin'];

      if (!$is_admin) {
        echo
        '<div class="w-50 d-flex justify-content-between">
        <h4 class="card-title">' . $sl . '. ' . $user_name . '</h4>
        <a href="manage_user.php?id=' . $id . '" class="btn btn-outline-danger m-1">Remove <i class="bi bi-trash"></i></a>
        </div>';
        $sl++;
      }
    }
    ?>
    <button class="btn btn-danger" id="userAddBtn">ADD USER <i class="bi bi-person-plus-fill"></i></button>

    <div class="user-add">
      <div id="userAddForm" style="display: none;">
        <form class="p-5 my-4 w-75 m-auto shadow d-flex flex-column justify-content-center" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
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

          <input type="submit" name="addUserSubmit" class="btn btn-danger" value="ADD USER">

        </form>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script>
    const userAddBtn = document.getElementById('userAddBtn');
    const userAddForm = document.getElementById('userAddForm');

    userAddBtn.addEventListener('click', () => {
      userAddForm.style.display = "block";
      window.scrollBy(0, 500);
    });
  </script>
</body>

</html>