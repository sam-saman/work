<?php
include 'db.php';
$ID =$_GET['id'];
session_start();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>eCommerce Product Detail</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" type="text/css" href="syle.css">
  </head>

<style>
#sam img{
width: 50px;
              }
#sam{

  margin-top: 10px;
}
</style>

  <body>
	 <?php
$query = " SELECT * FROM `tab` WHERE id='$ID'  ";

$queryfire = mysqli_query($con, $query);
?>
<?php
// while($row = mysqli_fetch_array($query))
// 						 {
//                          echo"";
// 						 ?>

	<div class="container">
		<div class="card">
		<?php
while($row = mysqli_fetch_assoc($queryfire))
{
?>
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="picc"><img src="<?php echo
					 $row['image'];  ?>" /></div>
						</div>


<!-- //.................. -->	
<div class="row" id="sam">
<div class="column" >
<?php
  
if($row['mImage'])
        {
          $img=explode(",",$row['mImage'],3 );
		  foreach($img AS $image){
		//	echo '<img src="car_images/'.$emp_code.'/'.$image.'">';
			echo "<img width='50' height='50' src='image/".$image."' alt='Profile Pic ' onclick=showmulti('image/".$image."') >"."<br>";
		}


		 // print_r(explode(",",$row['mImage'], 0 ));
            //echo "<img width='50' height='50' src='image/".$img."' alt='Profile Pic ' >"."<br>";
			
			// $img=explode(",",$row['mImage'])[1];
            // echo "<img width='50' height='50' src='image/".$img."' alt='Profile Pic ' >"."<br>";
			// $img=explode(",",$row['mImage'])[2];
            // echo "<img width='50' height='50' src='image/".$img."' alt='Profile Pic ' >"."<br>";
		
         }
        ?>
</div>
</div>
<!-- //.................. -->
					</div>
					<div class="details col-md-6">
						<h3 class="product-title"><?php echo
					 $row['p_name'];  ?>  </h3>
						<div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<span class="review-no">41 reviews</span>
						</div>

						<h4 class="price">Brand: <span><?php echo
					 $row['brand'];  ?></span></h4>
						<h4 class="price">current price: <span><?php echo
					 $row['price'];  ?></span></h4>
						<p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
					
						<?php 
						}
						?>
						<div class="action">
							<button class="add-to-cart btn btn-default" type="button">BUY NOW </button>
							<button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

  </body>
  <script>
     function showmulti(im){

		jQuery('#picc').html("<img src='"+im+"'/>");
	 }

  </script>
</html>
