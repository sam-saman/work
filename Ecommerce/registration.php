<?php

session_start();


?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

include 'db.php';

if(isset($_POST['submit'])){


    $username = mysqli_real_escape_string($con,$_POST['username']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $pass = mysqli_real_escape_string($con,$_POST['password']);
    $cpass = mysqli_real_escape_string($con,$_POST['Cpassword']);

  
$passs = password_hash($pass,PASSWORD_BCRYPT);
$cpasss = password_hash($cpass,PASSWORD_BCRYPT);


  $e_query = "select * from signup where email ='$email'";
$query= mysqli_query($con,$e_query);
$emailcount = mysqli_num_rows($query);

if($emailcount>0){

echo "email already  existed";

}else{

     if($pass===$cpass){
         
 $insert = "insert into signup (username,email,password,cpassword) values('$username','$email','$passs','$cpasss')";
 $insertquery =mysqli_query($con,$insert);

if($insertquery){

    ?>


<script>
    alert("inserted succesfully");
</script>

    <?php



}
else{


    ?>
    <script>
        alert(" not inserted succesfully");
    </script>
        <?php
 
    }


}


     else{

        ?>
        <script>
            alert(" password are not matching");
        </script>
            <?php
     
     }

}







}



?>











<div class="header">
	<h2> Admin Registration</h2>
</div>
<form method="post" action="#">
	<div class="input-group">
		<label>Username</label>
		<input type="text" name="username" value="" required>
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="email" value="" required>
	</div>
	<div class="input-group">
		<label>Password</label>
		<input type="password" name="password" required>
	</div>
	<div class="input-group">
		<label>Confirm password</label>
		<input type="password" name="Cpassword" required>
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="submit">Register</button>
	</div>
	<p>
		Already a member? <a href="login.php">Sign in</a>
	</p>
</form>
</body>
</html>