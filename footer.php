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
    footer {
      background-color: #333;
      padding: 2rem 0;
    }

    footer .col-3 {
      margin-bottom: 2rem;
    }

    footer img {
      max-height: 50px;
    }

    footer .nav-link {
      color: #fff;
    }

    .social-icons {
      font-size: 1.9rem;
    }

    .bi {
      color: #fff;
      transition: all 0.5s;
      position: absolute;
    }

    footer .bi:hover {
      transform: translateY(-10px);
      /* transform: scale(1.5); */
    }

    .bi-facebook:hover {
      color: #1976D2;
    }

    .bi-youtube:hover {
      color: #f00;
    }

    .bi-github:hover {
      color: #1d1a1a;
    }

    .bi-linkedin:hover {
      color: #0072b1;
    }

    #logoImg,img{
      cursor: pointer;
    }
  </style>
</head>

<body>
  <footer id="footer">

    <div class="container text-white">

      <div class="row">

        <div class="col-4">
          <div class="w-100 mt-5 d-flex justify-content-center">
            <a href="index.php">
              <img id="logoImg" src="./img/logo2.png" height="500px">
            </a>
          </div>
          <div class="row mt-5">
            <img class="img-fluid col-6" src="./img/playstore.png" alt="">
            <img class="img-fluid col-6" src="./img/appstore.png" alt="">
          </div>
        </div>

        <div class="col-4">
          <h5>Get Courses On</h5>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="courses.php">PHP</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="courses.php">JAVA</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="courses.php">Android</a>
            </li>
            <li class="nav-item">
              <a class="nav-link">Database</a>
            </li>
          </ul>
        </div>
        <div class="col-4">
          <h5>Latest Blogs</h5>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="blog.php">Begin your PHP Journey</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog.php">Geting Started with Web</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog.ph">Learn Basics of JAVA</a>
            </li>
            <li class="nav-item">
              <a class="nav-link">Enrich your database knowledge</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="row text-center w-50 mx-auto mt-5 mb-5">
        <h5 class="mb-5">Find Us on Social Media</h5>
        <div class="row social-icons">
          <div class="col">
            <a href="https://www.facebook.com/this.is.emdadul/" target="_blank">
              <i class="bi bi-facebook"></i>
            </a>
          </div>
          <div class="col">
            <a href="https://www.youtube.com/" target="_blank">
              <i class="bi bi-youtube"></i>
            </a>
          </div>
          <div class="col">
            <a href="https://github.com/amdadul-haque" target="_blank">
              <i class="bi bi-github"></i>
            </a>
          </div>
          <div class="col">
            <a href="https://www.linkedin.com/" target="_blank">
              <i class="bi bi-linkedin"></i>
            </a>
          </div>
        </div>
      </div>
      <p class="text-center pt-5">&copy Copyright <?php echo date("Y"); ?> | All Rights Reaserved by onlineStudy.com</p>
    </div>
  </footer>
</body>

</html>