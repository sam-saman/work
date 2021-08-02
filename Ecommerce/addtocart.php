<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
body {
	margin-top: 100px;
}    
</style>
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-xs-8">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						<div class="row">
							<div class="col-xs-9">
								<h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
							</div>
							<div class="col-xs-3">
							<div><a class="btn btn-success text-white" type="button" href="Home.php" width="100px">Home</a></div>
								
								
						
							</div>
						</div>
					</div>
				</div>
                <?PHP

$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'admin');

// if($con){
// 	echo "connection succussful";
// }else{
// 	echo "no connection";
// }


$query = " SELECT * FROM `cart` ";
$queryfire = mysqli_query($con, $query);
$num = mysqli_num_rows($queryfire);
$totalamount=0;
if($num > 0){
    while($product = mysqli_fetch_array($queryfire)){
		$productid=$product['p_id'];
		$query2 = " SELECT * FROM `tab` where id=$productid";
		$queryf = mysqli_query($con, $query2);
        ?>
				<div class="panel-body">
					<div class="row">
<?php					while($products = mysqli_fetch_array($queryf)){?>
						<div class="col-xs-2"><img class="img-responsive" src="<?php echo
					 $products['image'];  ?>">

						</div>
						<div class="col-xs-4">
							<h4 class="product-name"><strong><?php echo $product['p_name'];  ?></strong></h4><h4><small><?php echo $products['brand'];  ?></small></h4>
						</div>
						<?php					}?>
						<div class="col-xs-6">
							<div class="col-xs-6 text-right">
								<h6>  <strong>Price :<?php echo $product['p_price'];  ?> <span class="text-muted">x</span></strong></h6>
							</div>
							<div class="col-xs-4">

                               <a href="updatecart.php?quan=<?php echo $product['p_quantity'];?>&quantity=1&p_id=<?php echo $product['p_id'];?>"  style="font-size:20px;">+</a> 
								<input type="text" class="form-control" style="width:45px;" value="<?php echo $product['p_quantity'];?>" readonly>
                                <?php
                                if($product['p_quantity']>0)
                                {?>
                                    <a href="updatecart.php?quan=<?php echo $product['p_quantity'];?>&quantity=-1&p_id=<?php echo $product['p_id'];?>" style="font-size:20px">-</a> 
                                    <?php
                                }
                                ?>

							</div>


							<div class="col-xs-2">
								<button type="button" class="btn btn-link btn-xs">
								<a href="delpro.php?id=<?php echo $product['p_id'];?>"><span class="glyphicon glyphicon-trash"> </span></a>
								</button>
							</div>
						</div>
					</div>
					<hr>
				<?php
			  $totalamount= $totalamount+($product['p_price']*$product['p_quantity']);
			}}?>	
					<div class="panel-footer">
						<div class="row text-center">
							<div class="col-xs-9">
								<h4 class="text-right">Total <strong>$<?php echo $totalamount?></strong></h4>
							</div>
							 	<div class="col-xs-3">
								<button type="button" class="btn btn-success btn-block">
									Checkout
								</button>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>
</div>    
</body>
</html>



