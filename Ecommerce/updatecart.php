<?php

include 'db.php';
$ID =$_GET['quan'];
$qau =$_GET['quantity'];
$pid =$_GET['p_id'];         
 $insert = "UPDATE `cart` SET p_quantity=$ID+($qau) WHERE p_id=$pid";
 $insertquery =mysqli_query($con,$insert);
 if($insertquery)
 {
   $query = " SELECT * FROM `cart` where p_id=$pid";
   $queryfire = mysqli_query($con, $query);
   while($product = mysqli_fetch_array($queryfire))
   {
      if($product['p_quantity']==0)
      {
         $del = "DELETE FROM `cart`  WHERE p_id=$pid";
         $delquery =mysqli_query($con,$del);
      }
   }
    header('location:addtocart.php');
 }


?>







