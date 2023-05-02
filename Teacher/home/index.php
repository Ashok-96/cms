<?php
session_start();
date_default_timezone_set('asia/kolkata');
$timestamp = date("Y-m-d H:i:s");
$pageName = explode('/', $_SERVER['REQUEST_URI'])[2];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,300&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
<script type="text/javascript" src="js/sdashboard.js"></script>
<script type="text/javascript" src="js/popover.js"></script>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>home</title>
<head>
<style>
  @import url('https://fonts.googleapis.com/css?family=Tajawal');
@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
@media(min-width: 990px){
#footer{
margin-top: 50%;
}
}
#card{
  width: 15rem;
  color: white;
  background-color: rgba(0, 0, 150, 0);
}
.alert-primary{
  background: url('./1467776.jpg' ); 
  background-repeat: no-repeat;
  background-size: 100%;
  color: whitesmoke;
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<script type="text/javascript" src="js/jquery.js"></script>


<?php
 include'../topbar.php';?> 

</head> 
<body class="alert-primary" >
<div class="container-fluid">
  <h3>Hello, <?php 
  echo $_SESSION['teacher']; ?></h3>
</div>
<div class="container mx-auto my-5">
<div class="row">
<div class="card  shadow m-1  " id="card" >
<div class="card-head p-3 ">
<i class="fa fa-5x fa-file"></i>
</div>
<div class="card-body text-white">
  <div class="d-flex justify-content-between">
    <span>Total</span>
    <span>0</span>
  </div>
  <div class="d-flex justify-content-between">
    <span>Completed</span>
    <span>0</span>
  </div>
</div>
</div>
<div class="card shadow m-1" id="card" >
<div class="card-head p-3">
<i class="fa fa-5x fa-braille"></i>
</div>
<div class="card-body ">
  <div class="d-flex justify-content-between">
    <span>Total</span>
    <span>0</span>
  </div>
  <div class="d-flex justify-content-between">
    <span>Completed</span>
    <span>0</span>
  </div>
</div>
</div>
<div class="card shadow m-1" id="card" >
<div class="card-head p-3">
<i class="fa fa-5x fa-ticket"></i>
</div>
<div class="card-body ">
  <div class="d-flex justify-content-between">
    <span>Total</span>
    <span>0</span>
  </div>
  <div class="d-flex justify-content-between">
    <span>Completed</span>
    <span>0</span>
  </div>
</div>
</div>
</div>


</body>

<footer class="fixed-bottom text-center my-auto mx-5 p-2">
  &copy; Class Management System 2020
</footer>
</html>
