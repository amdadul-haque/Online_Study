<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <?php


  if (isset($_REQUEST['updatePasswordSubmit'])) {
    session_start();
    echo "hello" . $_SESSION['id'] . $_SESSION['user_name'];
  } else {
    // echo "id not found <br>";
  }


  ?>



  <?php include 'navbar.php' ?>;

  <div class="container">
    <h3 class="text-center">Change Password</h3>
    <form class="p-5 my-4 w-75 m-auto shadow d-flex flex-column justify-content-center" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

      <div class="mb-3">
        <label for="old_pass" class="form-label">Old Password</label>
        <input type="password" class="form-control" id="old_pass" name="old_pass" value="1" placeholder="Enter Old Password" required />
      </div>

      <div class="mb-3">
        <label for="new_pass" class="form-label">New Password</label>
        <input type="password" class="form-control" id="new_pass" name="new_pass" value="2" placeholder="Enter New Password" required />
      </div>

      <div class="mb-3">
        <label for="c_new_pass" class="form-label">Confrim New Password</label>
        <input type="password" class="form-control" id="c_new_pass" name="c_new_pass" value="3" placeholder="Confirm New Password" required />
      </div>

      <input type="submit" name="updatePasswordSubmit" class="btn btn-warning" value="UPDATE PASSWORD">

    </form>
  </div>
  2
  <?php include 'footer.php' ?>;


</body>

</html>