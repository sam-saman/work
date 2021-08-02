<?php

session_start();


?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
include 'db.php';

if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($con,$_POST['email']);
    $pass = mysqli_real_escape_string($con,$_POST['password']);
 
    $S_email= "select * from signup where email='$email'";
  $query= mysqli_query($con,$S_email);


  $c_email= mysqli_num_rows($query);
  if($c_email){

    $email= mysqli_fetch_assoc($query);

 $password=$email['password'];

 $_SESSION['username'] =$email['username'];





 $passs= password_verify($pass,$password);

    if($passs){

        echo"login success";
        header('location:table.php');
    }
    else
    {
    echo"no success";
}

  }
  else{

    echo "invalid email";
  }

}


?>










	<div class="header">
		<h2>Admin Login</h2>
	</div>
	<form method="post" action="#">

	

		<div class="input-group">
			<label>Username</label>
			<input type="email" name="email" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="submit">Login</button>
		</div>
		<p>
			Not yet a member? <a href="registration.php">Sign up</a>
		</p>
	</form>
</body>
</html>