<!DOCTYPE html>
<html>
<head>
<style>
body{
background: url("./Assets/Background_Images/login_background.jpg");
background-size:cover;
background-repeat: no-repeat
}

</style>
	<?php 
session_start();
ob_start();
if (isset($_SESSION["admin"])) {
	echo "working";
	header("Location:./home/");
  } 
  else{
  
  	?>	        <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		</head>
	<title>Admin pannel</title>
</head>
<body class="">
			<div class="container   background-transparent">

				<form class="form mx-auto my-5  col-lg-5 background-transparent " method="post" action="<?php echo htmlspecialchars('./user_authentication.php',ENT_QUOTES) ; ?>">

					<div class="form-group ">
						<label for="username" class="text-white">Username</label>
						<input class="form-control  border border-dark" type="text" name="username" id="username">
					</div>

					<div class="form-group ">
					<label class="text-white" for="password">Password</label>
					<input class="form-control  border border-dark" type="password" name="password" id="password">
					</div>

					<div class="form-group">
						 <input class="btn bg-dark text-white" type="submit" name="submit" value="login">
					</div>

					
				</form>
			</div>	
		</body>

</html>
<?php } ?>