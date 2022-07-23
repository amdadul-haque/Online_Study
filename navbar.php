<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .nav-container {
      box-shadow: 0 8px 6px -6px #777;
    }

    #userMenuControl {
      position: relative;
    }

    #user_menu {
      position: relative;
      top: 100;
      /* right: 100; */
    }
  </style>
</head>

<body>
  <div class="bg-light w-100 nav-container sticky-top">
    <div class="container">
      <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">
            <img src="./img/logo2.png" alt="" class="img-fluid" style="height: 50px;">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="courses.php">Courses</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="blog.php">Blog</a>
              </li>
            </ul>

            <?php
            session_start();
            if (isset($_SESSION['loggedin'])) {
              
              $user_name =  $_SESSION['user_name'];
              $id = $_SESSION['id'];

              echo '
              <div class="dropdown" id="userMenuControl">
              <a class="btn btn-secondary m-1">
                <i class="bi bi-person-circle"></i>
                <span class=" ms-4"> ' . $user_name . ' </span>
              </a>
              </div>';
            } else {
              echo '
              <a href="login.php" class="btn btn-outline-primary">LOGIN</a>
              <a href="signup.php" class="mx-2 btn btn-danger">SIGN UP</a>';
            }
            ?>

            <div id="user_menu" class="bg-warning d-none">
              <ul style="list-style-type:none;">
                <li>
                  <a class="dropdown-item btn btn-outline-secondary" href="user_dashboard.php">
                    <i class="bi bi-window-dash text-dark"></i>
                    <span class=" ms-4"> Dashboard </span>
                  </a>
                </li>
                <li>
                  <?php echo '<a href="change_user_pass.php?id=' . $id . '" class="dropdown-item btn btn-outline-secondary">'; ?>
                  <i class="bi bi-key-fill text-dark"></i>
                  <span class=" ms-4"> Change Password </span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item btn btn-outline-secondary" href="logout.php">
                    <i class="bi bi-box-arrow-right text-dark"></i>
                    <span class=" ms-4"> Log Out </span>
                  </a>
                </li>
              </ul>
            </div>

          </div>
        </div>
      </nav>
    </div>
  </div>

  <script>
    const userMenuControl = document.getElementById('userMenuControl');
    const userMenu = document.getElementById('user_menu');

    userMenuControl.addEventListener('click', () => {
      userMenu.classList.toggle('d-none');
    })
  </script>

</body>

</html>