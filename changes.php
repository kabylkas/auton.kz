<?php
//changing code bla bla bla
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
//Start the session
session_start();
//Require the class
require('formkey.class.php');
//Start the class
$formKey = new formKey();
 
$error = 0;

//Is request?
if ($_SESSION["was"] == 1) 
{
  header("Location: http://10.1.71.164/auton.kz/");  
}
elseif($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //Validate the form key
    if(!isset($_POST['form_key']) || !$formKey->validate())
    {
        //Form key is invalid, show an error
        $error = 1;
    }
    else
    {   
        //Do the rest of your validation here
        $error = 'No form key error!';
        require_once('config.php');
        $con = mysqli_connect($db_host, $username , $password, $db);
        $name = mysqli_real_escape_string($con, $_POST['yourname']);
        $phone = mysqli_real_escape_string($con, $_POST['yourphone']);
        $email = mysqli_real_escape_string($con, $_POST['youremail']);
        
        if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        
        do {
          $conf_number = generateRandomString(8);
          $query = "SELECT * from $table where conf_number = '$conf_number'";
          $result = mysqli_query($con, $query);
          $rows = $result->num_rows;
        } while ($rows>0);
        
        $query = "INSERT INTO $table (name, email, phone, conf_number) VALUES ('$name', '$email','$phone', '$conf_number')";
        mysqli_query($con, $query);
    }
} else {
  $error = 1;
}
?>
<html>
<head>
  <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&subset=latin,cyrillic' rel='stylesheet' type='text/css'>    
</head>
<style>
  #box {
    width: 100%; 
    text-align: center;
    font-family: 'PT Sans Narrow', sans-serif;
    padding: 30px;
    font-size: 25px;
  }
  
  h2 {
    font-size: 40px;
  }
</style>
<body style="background-color: rgb(221, 221, 221);">
<div id="box">
  <?php
    if ($error == 0){
  ?>
  <h2>Номер заказа: <b><?php echo $conf_number; ?></b></h2><br>
  Мы очень благодарны за проявленный интерес к нашему сервису!<br>
  Ты можешь забрать свою купонную книгу в Табанане :)<br>
  При покупке, покажи номер заказа.<br>
  <a href="http://auton.kz/#buy1">Вернуться на главную</a>
  <?php
    } else {
      echo '<h1 style="color: red;">Ошибка: либо ты лезишь куда не надо, либо что пошло не по плану!</h1>';
    }
    $_SESSION["was"] = 1;
  ?>
</div>
</body>
</html>
