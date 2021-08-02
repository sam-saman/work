
<?php

include 'db.php';


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Dancing+Script" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>

<br><br>
<div class="container">
	
<a class="btn btn-success text-white" type="button" href="login.php"\ width="100px">Sign In</a>   <span><a class=" btn btn-danger text-white" type="button" href="registration.php" >Register</a> </span>
<a class="btn btn-primary text-white" type="button" href="addtocart.php" width="100px">Cart</a>
   
         
        </div>

<div class="container">
	<h1 class="text-center text-danger mb-5" 
	style="font-family: 'Abril Fatface', cursive;"> Products</h1>

	<div class="row">

	<?PHP

	$con = mysqli_connect('localhost','root');
	mysqli_select_db($con,'admin');

	// if($con){
	// 	echo "connection succussful";
	// }else{
	// 	echo "no connection";
	// }


	$query = " SELECT * FROM `tab`  order by id ASC ";

	$queryfire = mysqli_query($con, $query);

	$num = mysqli_num_rows($queryfire);

	if($num > 0){
		while($product = mysqli_fetch_array($queryfire)){
			?>
			
		<div class="col-lg-3 col-md-3 col-sm-12">
				<div class="card">
					<h6 class="card-title bg-info text-white p-2 text-uppercase"> <?php echo
					 $product['p_name'];  ?>   </h6>
					 
					<div class="card-body">
						 <img src="<?php echo
					 $product['image'];  ?>" height="100px" width="200x" alt="phone" class="img-fluid mb-2" >

					 <h6> 	&#8360;: <?php echo $product['price'];  ?> </h6> 
					 <h6><?php echo $product['brand'];  ?></h6>
					  
					 <h6 class="badge badge-success"> 4.4 <i class="fa fa-star"> </i> </h6>

					 <!-- <input type="text" name="" class="form-control" placeholder="Quantity">  -->

					</div>
					<div class="btn-group d-flex">
					<a href="details.php?id=<?php echo $product['id'];  ?>" class="btn btn-success flex-fill">Details</a>
					<form method="POST">
						<input type="hidden" name="p_id" value="<?php echo $product['id'];  ?>">
						<input type="hidden" name="p_name" value="<?php echo $product['p_name'];  ?>">
						<input type="hidden" name="p_price" value="<?php echo $product['price'];  ?>">
						<input type="hidden" name="quantity" value="1">
					<input type="submit" name="sub" class="btn btn-warning flex-fill text-white" value="Add to cart"> 
					</form>
				</div>
				</div>


		</div>
	<?php	
		
		

		}
		if(isset($_POST['sub']))
		{
			$P_id =$_POST['p_id'];
			$P_name =$_POST['p_name'];
			$Price =$_POST['p_price'];
			$quan =$_POST['quantity'];
           if($quan==""){

			$quan=1;

		   }

			$queryselect = " SELECT * FROM `cart` where p_id=$P_id";
			$queryfire = mysqli_query($con, $queryselect);
			$num = mysqli_num_rows($queryfire);
			if($num>0)
			{
				while($product = mysqli_fetch_array($queryfire))
			   {
				$q=$product['p_quantity'];
			   }
				$update = "UPDATE `cart` SET p_quantity=$q+1 WHERE p_id=$P_id";
				$query1= mysqli_query($con,$update);


			}
			else
			{
				$e_query = "INSERT INTO `cart`( `p_id`, `p_name`, `p_price`, `p_quantity`) VALUES('$P_id','$P_name','$Price','$quan')";
				$query= mysqli_query($con,$e_query);
			}

		}
	}
	?>


</div>

</body>
</html>