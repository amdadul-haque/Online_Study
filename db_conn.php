<?php

$host = "localhost";
$username = "root";
$password = "";

$db_name = "online_study";

$conn = mysqli_connect($host, $username, $password, $db_name);

if (!$conn) {
  echo "Connection failed!";
}
else{
  // echo "Success";
}

// $sql2 = "INSERT INTO `users`( `name`, `email`, `password`) VALUES ('Doe','doe@gmail.com','999')";
// $result2 = mysqli_query($conn, $sql2);

// $sql = "SELECT * FROM users";
// $result = mysqli_query($conn, $sql);
// $resultCheck = mysqli_num_rows($result);
// echo $resultCheck . "<br>";
// if ($resultCheck > 0) {
//   while ($row = mysqli_fetch_assoc($result)) {
//     echo $row['name'] . "<br>";
//   }
// }
