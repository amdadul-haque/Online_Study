<h1>This is logout page</h1>

<?php
session_start();
session_destroy();
header("location: index.php");
?>