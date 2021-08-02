
<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- //<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }
  </style>
<body>
 <?php
 $result=mysqli_query($con,"select image from tab");
 echo '<pre>' , var_dump($result) , '</pre>';
 ?>   
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
        <div id="demo" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ul class="carousel-indicators">
<?php
$i=0;
foreach($result as $row){
    $actives ='';
    if($i == 0){
 $actives = 'active';
}
  ?>
  <li data-target="#demo" data-slide-to="<?=  $i; ?>" class="<?= $actives; ?>"></li>
  <?php
  $i++;}
  ?>
  
</ul>

<!-- The slideshow -->
<div class="carousel-inner">
<?php
  
  $i=0;
  foreach($result as $row){

    $active ='';
    if($i == 0){

$active = 'active';
}
  

  ?>
  <div class="carousel-item <?= $actives;?>">
    <img src="<?= $row['image']?>" width="100%" height="400">
  </div>

<?php

$i++;}


?>


  <!-- <div class="carousel-item">
    <img src="chicago.jpg" alt="Chicago">
  </div>
  <div class="carousel-item">
    <img src="ny.jpg" alt="New York">
  </div> -->
</div>

<!-- Left and right controls -->
<a class="carousel-control-prev" href="#demo" data-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#demo" data-slide="next">
  <span class="carousel-control-next-icon"></span>
</a>

</div>


        </div>
    </div>
</div>



</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>