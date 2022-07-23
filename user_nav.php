<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body class="bg-dark container pt-3">

  <div class="bg-light">
    <?php
    echo "hello" . $_SESSION['id'] . $_SESSION['user_name'];
    ?>
  </div>

  <?php
  include 'db_conn.php';

  $sql = "SELECT * FROM course";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);
  $totalCourse = $resultCheck;
  // echo $resultCheck;

  $sql = "SELECT * FROM blog";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);
  $totalBlog = $resultCheck;
  // echo $resultCheck;

  ?>
  <div class="container">
    <div class="row d-flex text-center text-white mt-4">
      <div class="col-md-6 col-sm-6">
        <div class="card bg-primary">
          <div class="d-flex py-2">
            <div class="col-8 d-flex flex-column justify-content-center align-items-center">
              <?php echo '<h1>' . $totalCourse . '</h1>' ?>
              <h4>COURSE</h4>
            </div>
            <div class="col-4 d-flex justify-content-center align-items-center" style="font-size:3.5rem;">
              <i class="bi bi-book-fill"></i>
            </div>
          </div>
          <a href="user_dashboard.php" class="btn btn-warning w-50 m-auto mb-3">MANAGE</a>
        </div>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="card bg-success">
          <div class="d-flex py-2">
            <div class="col-8 d-flex flex-column justify-content-center align-items-center">
              <?php echo '<h1>' . $totalBlog . '</h1>' ?>
              <h4>BLOGS</h4>
            </div>
            <div class="col-4 d-flex justify-content-center align-items-center" style="font-size:3.5rem;">
              <i class="bi bi-journal-album"></i>
            </div>
          </div>
          <a href="user_dashboard.php" class="btn btn-warning w-50 m-auto mb-3">MANAGE</a>
        </div>
      </div>

    </div>
  </div>
</body>

</html>