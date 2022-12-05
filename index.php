	<?php
    
	require_once('./Common files/db/dbutil.php');
	session_start();
	ob_start();
	if (isset($_SESSION["type"])) {
		header("url=/Student/home.php");
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
	body{
		background-color: whitesmoke;
	}

	</style>
	</head>
	<body>
		<div class="container mx-auto my-5 py-5 ">
			<div class="row shadow mx-auto py-5 border p-3 col-lg-5">
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"  >
					<div class="form-group">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" class="form-control"/>
					</div>
					<div class="form-group">
						<label for="password" class="">Password</label>
						<input class="form-control" type="password" name="password" id="password"/>
					</div>
					<div class="form-group">
						<input class="btn btn-primary" type="submit" name="submit" value="submit"/>
					</div>
				</form>
			</div>
		</div>
	</body>
	<?php
	/*functional part*/
	if (isset($_POST['submit'])) {   
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$db = new dbutil();
	$sql = "SELECT * FROM `users` WHERE username='".$username."' or email='".$username."' and password ='".$password."'";
				$result=$db->queryRequest($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						if( ($row['username'] == $username ||$row['email'] == $username) && $row['password'] == $password ){
							$_SESSION["userID"] = $row['id'];
							$_SESSION["user"] = $row['username'];
							$_SESSION["type"] = $row['type'];
									echo "<script>swal('welcome!','Authenticated Successfully','success')</script>";
													header( "refresh:2; url=./Student/home.php" );
						}else{
							echo "<script> swal('HOOOPS','Please eneter correct username and password','warning'); </script>";
													header( "refresh:2; url=index.php" );
						}
					}
				}
			}		

	?>
	</body>
	</html>
	<?php }  ?>