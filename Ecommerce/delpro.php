<?php

include 'db.php';
$ID =$_GET['id'];         
 $delete = "DELETE FROM `cart`  WHERE p_id=$ID";
 $deletequery =mysqli_query($con,$delete);
 if($deletequery)
 {
    header('location:addtocart.php');
 }

?>







