<?php
session_start();
include 'db/dbutil.php';	
 
 if (isset($_SESSION['Teacher'])) {
$var=explode('/', $_SESSION['class']);
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="js/dashboard.js"></script>

<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500;600&display=swap" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.css"/>
<script type="text/javascript" src="js/teacher.js"></script>
</head>
<?php include 'topbar.php';  ?>
<body>
	<div class="container">
<div class="row">
	<div class="col-lg-12">
		<div class="d-flex justify-content-between">
			<div class="display-5">Hello, <?php  echo $_SESSION['Teacher'];	 ?></div>
			<div class="display-5"><?php  echo date('d-M-y');	 ?></div>
		</div>
</div>
</div>
</body>
</html>
<?php }	 ?>