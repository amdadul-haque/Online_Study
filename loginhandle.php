<?php

include 'db_conn.php';
echo '<h1>This is login handle</h1>';
$login_email = $_POST['loginEmail'];
$login_password = $_POST['loginPassword'];





$sql1 = "SELECT name FROM users where email = '$login_email' and password = '$login_password' ";
$result = mysqli_query($conn, $sql1);
$resultCheck = mysqli_num_rows($result);

$name = mysqli_fetch_assoc($result);


if ($resultCheck > 0) {
  echo "You are succesfully loged in Mr. " . $name['name'];
  $user_name = $name['name'];
  echo 'user-name is ' . $user_name;
  
  session_start();
  $_SESSION['loggedin'] = true;
  $_SESSION['user_name'] = $user_name;
  // header("location: index.php");
  
} else {
  echo "Email or password not matched";
  $_SESSION['logedIn'] = false;
  // header("location: login.php");
}
