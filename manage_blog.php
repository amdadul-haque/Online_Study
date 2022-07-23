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

      $title = $_POST['title'];
      $b_subtitle = $_POST['b_subtitle'];
      $para_1 = $_POST['para_1'];
      $para_2 = $_POST['para_2'];
      $para_3 = $_POST['para_3'];

      $sql = "INSERT INTO `blog` (`title`, `subtitle`, `para_1`,`para_2`,`para_3`) VALUES ('$title', '$b_subtitle', '$para_1','$para_2','$para_3')";
      $result = mysqli_query($conn, $sql);
      // echo $c_img . $c_title . $c_desc;
    }
    ?>
    <h2 class="mb-2">Current BLOG</h2>
    <div class="current-course">
      <?php

      if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM `blog` WHERE id = '$id' ";
        $result = mysqli_query($conn, $sql);
      }

      $sql = "SELECT * FROM blog";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);

      $sl = 1;
      while ($rows = mysqli_fetch_array($result)) {
        $id = $rows['id'];
        $title = $rows['title'];

        echo
        '<div class="w-50 d-flex justify-content-between">
            <h4 class="card-title">' . $sl . '. ' . $title . '</h4>
            <a href="manage_blog.php?id=' . $id . '" class="btn btn-outline-danger m-1">Remove <i class="bi bi-trash"></i></a>
            </div>';
        $sl++;
      }
      ?>
    </div>

    <button class="btn btn-success" id="courseAddBtn">ADD BLOG</button>


    <div class="course-add">

      <div id="courseAddForm" style="display: none;">
        <form class="p-5 my-4 w-75 m-auto shadow d-flex flex-column justify-content-center" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required />
          </div>

          <div class="mb-3">
            <label for="b_subtitle" class="form-label">Blog subitle</label>
            <input type="text" class="form-control" id="b_subtitle" name="b_subtitle" placeholder="Enter subtitle" required />
          </div>
          
          <div class="mb-3">
            <label for="para_1" class="form-label">Paragraph 2</label>
            <input type="text" class="form-control" id="para_1" name="para_1" placeholder="Enter a pragraph" required />
          </div>

          <div class="mb-3">
            <label for="para_2" class="form-label">Paragraph 2</label>
            <input type="text" class="form-control" id="para_2" name="para_2" placeholder="Enter a pragraph" required />
          </div>
          <div class="mb-3">
            <label for="para_3" class="form-label">Paragraph 3</label>
            <input type="text" class="form-control" id="para_3" name="para_3" placeholder="Enter a pragraph" required />
          </div>


          <input type="submit" name="addCourseSubmit" class="btn btn-success" value="ADD BLOG">

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
