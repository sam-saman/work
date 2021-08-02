<?php

include 'db.php';


?>


<?php

if(isset($_POST['submit']))
{

$name =$_POST['p_name'];
$Brand =$_POST['brand'];
$Price =$_POST['price'];
$imageName = $_FILES['mImages'];
//print_r($_FILES['mImages']);
 $img_loc = $_FILES['mImages']['tmp_name'];
 $image_name=$_FILES['mImages']['name'];
 $image_des = "image/".$image_name;
 move_uploaded_file($img_loc,'image/'.$image_name);
 $image_n = $_FILES['myImages']['name'];
 $imageTmpName = $_FILES['myImages']['tmp_name'];
 for($i = 0; $i < count($imageTmpName); $i++)
 {
     if(move_uploaded_file($imageTmpName[$i], "image/".$image_n[$i]))
     {
     
   //    echo'success';
     //  echo $_SESSION['username'];
       $images[]=$image_n[$i];
   
     }

$all_images = implode(",",$images);
    }

 mysqli_query($con,"insert into tab(p_name,brand,price,image,mImage) values('$name','$Brand','$Price','$image_des','$all_images') ");
 
 header('location:table.php');


}




?>
