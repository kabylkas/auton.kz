<?php
  require('config.php');
  $db = "visitors";
  $con = mysqli_connect($db_host, $username , $password, $db) or die(mysqli_error());
?>