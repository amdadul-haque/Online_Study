<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <title>Document</title> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <style>
    .courses {
      height: 100vh;
      background-color: tomato;
    }
  </style>
</head>

<body>

  <?php include 'navbar.php';
  include("db_conn.php");
  ?>

  <?php
  // echo $_SESSION['loggedin'];
  // echo $_SESSION['id'];
  if (!$_SESSION['loggedin']) {
    // header("location: login.php");
    echo "login first";
  } else {
    header("location: blog.php");
  }
  ?>

  <?php include 'footer.php'; ?>

</body>

</html>