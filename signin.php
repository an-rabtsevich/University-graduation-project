<?php

require 'config/connectDB.php';
require 'vendor/autoload.php';

$signinInfo = mysqli_query($connect, "SELECT * FROM `signin_info`");

$signinInfo = mysqli_fetch_all($signinInfo);

$login = $_POST['floatingInput'];
$password = $_POST['floatingPassword'];

if (($login == $signinInfo[0][1]) && ($password == $signinInfo[0][2])) {
  header('Location: /mainPage.html');
}
else{
  header('Location: /index.html');
}

?>