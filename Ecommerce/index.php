<?php

session_start();
if(!isset($_SESSION['username'])){
  echo 'you are logout';
  header('location:login.php');

}


?>

