<?php
  function generateRandomString($length = 10) {
      $characters = '0123456789';
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, strlen($characters) - 1)];
      }
      return $randomString;
  }
  
  echo "Random strings:<br>";
  for ($i=0; $i<200; $i++)
  {
    echo generateRandomString(16)."<br>";
  }
?>