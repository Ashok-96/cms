<?php
session_start();
 if (isset($_SESSION['Teacher'])) {
include 'db/dbutil.php';	
}
$var=explode('/', $_SESSION['class']);
  ?>
<!DOCTYPE html>
<html>
<head>
	<style >
		
	</style>
	<title>Teacher's page</title>
	<link rel="stylesheet" type="text/css" href="css/teacher.css">
	       <meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="js/jquery.js"></script>

<script type="text/javascript" src="js/dashboard.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>

<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500;600&display=swap" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.css"/>

<link rel="stylesheet" type="text/css" href="Buttons-1.6.2/css/buttons.bootstrap4.min.css">
</head>
<?php include 'topbar.php';  ?>
<body>
	<div class="container">
<div class="row">
	<div class="col-lg-8 p-5   mt-5">
		<div class="card">
			<div class="card-head">
				<img src="../im/demo.jpg" class="col-lg-8">
			</div>
		</div>
	</div>
</div>
</div>
</body>
</html>