
<?php


include 'db.php';

$ID =$_GET['id'];
$rec=mysqli_query($con,"select * from tab  where id= $ID") ;

$dat_fetch=mysqli_fetch_array($rec);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<form action="#" method="POST" enctype="multipart/form-data" >
				<div class="modal-header">						
					
				
						<label>Product Name</label>

						<input type="text" class="form-control" name="p_name" value="<?php echo $dat_fetch['p_name'];?>" required>
					</div>
                    <br>
                    <br>
					<div class="form-group">
						<label>Brand</label>
						<input type="text" class="form-control" name="brand"  value="<?php echo $dat_fetch['brand'];?>" required>
					</div>
                    <br>
                    <br>
					<div class="form-group">
						<label>Price</label>
                        <input type="text" class="form-control" name="price"  value="<?php echo $dat_fetch['price'];?>" required>
					</div>

                    <br>
                    <br>

                    <div class="form-group">
						<label>Image</label>
                     <td>   <input type="file" class="form-control" name="mImages"  value="<?php echo $dat_fetch['image'];?>"  required><img src="<?php echo $dat_fetch['image']?>"  width ='200px' height='100px'></td>
					</div>

										
				</div>
                <br>
              <br>
              <input type="hidden" name="id" value="<?php echo $dat_fetch['id'] ?>">
              <input type="submit" class="btn btn-primary"  name="submit" value="update">

</form>






<?php

if(isset($_POST['submit']))
{
echo'success';

$id=$_POST['id'];
$name =$_POST['p_name'];
$Brand =$_POST['brand'];
$Price =$_POST['price'];
$imageName = $_FILES['mImages'];

 $img_loc = $_FILES['mImages']['tmp_name'];
 $image_name=$_FILES['mImages']['name'];
 $image_des = "image/".$image_name;
 move_uploaded_file($img_loc,'image/'.$image_name);

//$q= mysqli_query($con,"UPDATE tab SET p_name='$name', brand='$Brand', price='$Price, image ='$image_des' where id= $id ");

$q= mysqli_query($con,"UPDATE tab SET `p_name`='$name',`brand`='$Brand',`price`='$Price',`image`='$image_des' WHERE id= $id ");
if($q){


    header('location:table.php');

}else{
    echo'f';
}

}

?>










</body>
</html>
