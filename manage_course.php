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
    <?php
    if (isset($_REQUEST['addCourseSubmit'])) {
      $c_img = $_POST['img'];
      $c_title = $_POST['c_title'];
      $c_desc = $_POST['c_desc'];

      $sql = "INSERT INTO `course` (`img`, `title`, `description`) VALUES ('$c_img', '$c_title', '$c_desc')";
      $result = mysqli_query($conn, $sql);
      // echo $c_img . $c_title . $c_desc;
    }
    ?>
    <h2 class="mb-2">Current Course</h2>
    <div class="current-course">
      <?php

      if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM `course` WHERE id = '$id' ";
        $result = mysqli_query($conn, $sql);
      }

      $sql = "SELECT * FROM course";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);

      $sl = 1;
      while ($rows = mysqli_fetch_array($result)) {
        $id = $rows['id'];
        $title = $rows['title'];
        $desc = $rows['description'];
        $img = 'img/course/' . $rows['img'];

        echo
        '<div class="w-50 d-flex justify-content-between">
            <h4 class="card-title">' . $sl . '. ' . $title . '</h4>
            <a href="manage_course.php?id=' . $id . '" class="btn btn-outline-danger m-1">Remove <i class="bi bi-trash"></i></a>
            </div>';
        $sl++;
      }
      ?>
    </div>

    <button class="btn btn-primary" id="courseAddBtn">ADD COURSE</button>


    <div class="course-add">

      <div id="courseAddForm" style="display: none;">
        <form class="p-5 my-4 w-75 m-auto shadow d-flex flex-column justify-content-center" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

          <div class="mb-3">
            <label for="img" class="form-label">Image Link</label>
            <input type="text" class="form-control" id="img" name="img" placeholder="Enter img link with extention" required />
          </div>

          <div class="mb-3">
            <label for="c_title" class="form-label">Course Title</label>
            <input type="text" class="form-control" id="c_title" name="c_title" placeholder="Enter Course Title" required />
          </div>

          <div class="mb-3">
            <label for="c_desc" class="form-label">Course Description</label>
            <input type="text" class="form-control" id="c_desc" name="c_desc" placeholder="Enter Course Description" required />
          </div>

          <input type="submit" name="addCourseSubmit" class="btn btn-primary" value="ADD COURSE">

        </form>
      </div>

    </div>
  </div>

  <script>
    const courseAddBtn = document.getElementById('courseAddBtn');
    const courseAddForm = document.getElementById('courseAddForm');

    courseAddBtn.addEventListener('click', () => {
      courseAddForm.style.display = "block";
      window.scrollBy(0, 500);
    });
  </script>
</body>

</html>