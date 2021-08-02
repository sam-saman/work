<?php
 
include 'db.php';
session_start();
if(!isset($_SESSION['username'])){
	echo 'you are logout';
	header('location:login.php');
  
  }
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css.css">

<script>
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
</head>
<body>

<h1>welcome  &nbsp;  <?php    echo $_SESSION['username']; ?> </h1>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Add <b>Products</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Product</span></a>
							<a class="btn btn-success text-white" type="button" href="Home.php" width="100px">Home</a>
						<a class="btn btn-success text-white" type="button" href="logout.php"\ width="100px">logout</a>  
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						
						<th>Product Name</th>
						<th>Brand</th>						
						<th>Price</th>
						<th>Image</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					
						<?php
						$query = mysqli_query($con,"select * from tab");
                         while($row = mysqli_fetch_array($query))
						 {
                         echo"
						 
						 <tr>
						
					
						 <td>$row[p_name]</td>
						 <td>$row[brand]</td>
						 <td>$row[price]</td>
						 <td><img src='$row[image]' width ='200px' height='100px'   ></td>
						
						<td>
				 	 <a href='update.php? id=$row[id]'  ><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>
						 <a href='delete.php? id=$row[id]' ><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>

						 </tr>  ";
						 }
						 
						?>
					
				</tbody>
			</table>
			
		</div>
	</div>        
</div>





<!-- add Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">

			<form action="add.php" method="POST" enctype="multipart/form-data" >
				<div class="modal-header">						
					<h4 class="modal-title">Add Product</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Product Name</label>
						<input type="text" class="form-control" name="p_name" required>
					</div>
					<div class="form-group">
						<label>Brand</label>
						<input type="text" class="form-control" name="brand" required>
					</div>
					<div class="form-group">
						<label>Price</label>
                        <input type="text" class="form-control" name="price" required>
					</div>
                    <div class="form-group">
						<label>Image</label>
                        <input type="file" class="form-control" name="mImages" required>
					</div>
					<div class="form-group">
						<label>Image</label>
                        <input type="file" class="form-control"  name="myImages[]" multiple required>
					</div>
										
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success"  name="submit" value="Add">
				</div>


			</form>
		</div>
	</div>
</div>



</body>
</html>