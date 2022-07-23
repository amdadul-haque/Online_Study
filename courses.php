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
      /* height: 100vh; */
      background-color: #444;
    }
  </style>
</head>

<body>

  <?php include 'navbar.php';
  include("db_conn.php");
  ?>



  <div class="courses text-center text-white d-flex flex-column justify-content-center align-items-center py-5">
    <h1 class="mb-4">Our Courses</h1>
    <div class="container row d-flex text-center">
      <?php

      if (!$_SESSION['loggedin']) {
        header('Location: login.php');
      } else {
        // echo "Course Added";
        echo
        '
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong>Enrolled</strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
      }

      $sql = "SELECT * FROM course";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);

      while ($rows = mysqli_fetch_array($result)) {
        $id = $rows['id'];
        $title = $rows['title'];
        $desc = $rows['description'];
        $img = 'img/course/' . $rows['img'];

        echo
        '<div class="col-md-4 col-sm-6 my-3">
         <div class="card text-dark">
          <img src="' . $img . '" class="card-img-top" alt="...">
           <div class="card-body">
             <h5 class="card-title">' . $title . '</h5>
             <p class="card-text">' . $desc . '</p>
             <a href="courses.php?id=' . $id . '" class="btn btn-primary">' . $id . ' Enroll Now</a>
            </div>
          </div>
        </div>';
      }

      ?>
    </div>
  </div>

  <?php include 'footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>