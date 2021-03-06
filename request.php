﻿<?php
function generateRandomString($length = 10) {
    $characters = '0123456789';
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
$sale = 0;
$error = 0;

//Is request?
if ($sale == 1) {
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
          $con = mysqli_connect($db_host, $username , $password, $db) or die(mysqli_error());
          $name = mysqli_real_escape_string($con, $_POST['yourname']);
          $phone = mysqli_real_escape_string($con, $_POST['yourphone']);
          $email = mysqli_real_escape_string($con, $_POST['youremail']);
          $option = mysqli_real_escape_string($con, $_POST['option']);
          if ($option == "take_yourself") {
            $take_yourself = 1;
            $bring_me = 0;
          } elseif ($option == "bring_me") {
            $take_yourself = 0;
            $bring_me = 1;
          } else {
            $take_yourself = 0;
            $bring_me = 0;
          }
          
          if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }
          
          do {
            $conf_number = generateRandomString(12);
            $query = "SELECT * from $table where conf_number = '$conf_number'";
            $result = mysqli_query($con, $query);
            $rows = $result->num_rows;
          } while ($rows>0);
          
          $query = "INSERT INTO $table (name, email, phone, conf_number, take_yourself, bring_me) VALUES ('$name', '$email','$phone', '$conf_number', $take_yourself, $bring_me)";
          mysqli_query($con, $query) or die(mysqli_error());
      }
  } else {
    $error = 1;
  }
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
    if ($sale == 0) {
      echo '<h2>Мы очень благодарны за проявленный интерес к нашему сервису!<br>
      На данный момент все дисконтные карты распроданы.<br>
      Но не унывайте, мы активно работаем. Зайдите на наш сайт через 2 <br>
      недели, и станьте одним из первых покупателей дисконтной карты Auton.</h2><br>
      <a href="http://auton.kz/#buy1">Вернуться на главную</a>
      ';
    } else if ($error == 0){
  ?>
  <h2>Номер заказа: <b><?php echo $conf_number; ?></b></h2><br>
  Мы очень благодарны за проявленный интерес к нашему сервису!<br>
  <?php 
    if ($take_yourself == 1) {
  ?>
  Вы можете забрать свою дисконтную карту по следующим адресам:<br><br>
  1) ул. Байтурсынова,3  ЖК Хайвил, блок Б2<br>
  2) ул.Достык,5  ЖК Северное сияние, бутик 8<br>
  3) ул.Орынбор 21/1 ЖК Акжайк, цокольный этаж, бутик №1<br>
  4) ул. Мустафина, 1 (конец 13-магистрали, не доезжая новая Абая) при магазине «Фархад»<br>
  5) ул.Мусрепова, возле школы № 64, район 7-поликлиники, здание Helix<br><br>
  При покупке, покажите номер заказа.<br>
  <?php
    } elseif ($bring_me == 1) {
  ?>
  Ждите звонка, мы скоро с вами свяжемся.<br>
  При покупке, покажите номер заказа.<br>
  <?php
  } else {
    echo '<h1 style="color: red;">Ошибка: либо ты лезишь куда не надо, либо что пошло не по плану!</h1>';
  }
  ?>
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
