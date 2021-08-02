<?php
include 'db.php';

$ID =$_GET['id'];
mysqli_query($con,"Delete from tab where id=$ID") ;
header('location:table.php');




















?>