<?php 
session_start();
ob_start();
if (isset($_SESSION["type"])) {
	echo "working";
	header("url=home.php");
  } 
  else{ ?>
 <!DOCTYPE html> 	
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<style>


	h1{
	color: black;
	}

</style>
<body>
<div class="container">
<div id="myDiv" class="animate-bottom">	
	<h1 class="display-5">User Authentication</h1>
<div class="jumbotron">
	<form class="form-default" method="POST" action="demo.php">
	<input type="text" name="username" class="form-control"></br>
	<input type="password" name="password" class="form-control"></br>
	<button type="submit" name="submit" value="submit" class="fa fa-power-off btn btn-outline-success btn-lg"> Login
	</button></br></br>
	<a type="button" class=" btn btn-outline-info fa fa-address-book" href="register.php"><strong> Click Here To Register!!!</strong></a>
	</form>
</div>
</div>
</div>
</div>
<?php
/*functional part*/
require_once('db/dbutil.php');
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$db = new dbutil();
$sql = "SELECT * FROM `admin` WHERE username='".$username."' or email='".$username."' and password ='".$password."'";
			$result=$db->queryRequest($sql);
			if ($result->num_rows > 0) {
    			while($row = $result->fetch_assoc()) {
        			if( ($row['username'] == $username ||$row['email'] == $username) && $row['password'] == $password ){
        				$_SESSION["userID"] = $row['id'];
						$_SESSION["user"] = $row['username'];
						$_SESSION["type"] = $row['type'];
								echo "<script>swal('CMS!!!',' welcomes you','success')</script>";
												header( "refresh:2; url=home.php" );
					}else{
						echo "<script> swal('HOOOPS','Please eneter correct password','warning'); </script>";
												header( "refresh:2; url=home.php" );
					}
    			}
    		}
    	}		

  ?>
</body>
</html>
<?php }  ?>