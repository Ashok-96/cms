<?php
		
		require_once('../Common files/db/dbutil.php');
		session_start();
		ob_start();
		if (isset($_SESSION["teacher"])) {
			
			header("Location: ./home");
			
		} 
		else{ 
            ?>
		<!DOCTYPE html> 	
		<html>
		<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

			<title>login</title>
			<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		</head>
		<style>
.container-fluid{
	max-height: 100%;
}
body{
	background: url('./Assets/Background_images/old-black-background-grunge-texture-dark-wallpaper-blackboard-chalkboard-room-wall_1258-28312.avif');
	background-repeat: repeat-x;
	background-size: cover;
	
}
	</style>
		</head>
		<body >
			<div class="container-fluid fixed-top ">

				<form class="form  p-5 col-lg-4 fixed-bottom shadow bg-transparent" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

					<div class="form-group ">
						<label for="username" class="text-white" >Username</label>
						<input class="form-control  border border-dark" type="text" name="username" id="username">
					</div>

					<div class="form-group ">
					<label for="password" class="text-white">Password</label>
					<input class="form-control  border border-dark" type="password" name="password" id="password">
					</div>

					<div class="form-group">
						 <input class="btn bg-transparent text-white" type="submit" name="submit" value="login">
					</div>
					
				</form>
			</div>
		</body>

		<?php
		/*functional part*/
		if (isset($_POST['submit'])) {   
			$username = $_POST['username'];
			$password = md5($_POST['password']);
			$db = new dbutil();
		$sql = "SELECT * FROM `teachers` WHERE username='".$username."' and password ='".$password."' AND `type`='Teacher'";
		$result=$db->queryRequest($sql);
		try{
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							if( ($row['username'] == $username) && $row['password'] == $password ){
								$_SESSION["teacherID"] = $row['id'];
								$_SESSION["teacher"] = $row['name'];
								$_SESSION["type"] = $row['type'];
										echo "<script>swal('welcome!','Authenticated Successfully','success')</script>";
														header( "refresh:2; url=./home/" );
							}
						}
				
					}else if($result->num_rows==0 ){
						echo "<script> swal('HOOOPS','Please eneter correct username and password','warning'); </script>";
					header( "refresh:2; url=index.php" );
					}
				}catch(Exception $e){
					echo "<script> swal('HOOOPS','Please eneter correct username and password','warning'); </script>";
					header( "refresh:2; url=index.php" );

				}
				}		

		?>
		
		</body>
		</html>
		<?php }  ?>