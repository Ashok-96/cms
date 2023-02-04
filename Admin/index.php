<!DOCTYPE html>
<html>
<head>
	<?php 
session_start();
ob_start();
if (isset($_SESSION["admin"])||isset($_SESSION['Teacher'])) {
	echo "working";
	header("Location:./home/");
  } 
  else{
  
  	?>	        <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@500&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<title>Admin pannel</title>
</head>
<body>
<div class="container">
  
        <div class="row">
          <div class="container">
            <div class="my-5">
              <h3 class="mb-4">Welcome back!</h3>
              <form method="post" action="<?php echo htmlspecialchars('user_authentication.php',ENT_QUOTES) ?>">
                <div class="form-group m-2">
                <label for="username">username/email</label>
                  <input type="text" id="username" name="username" class="form-control" placeholder="username/email" required autofocus>
                </div>

                <div class="form-group m-2">
                <label for="password">Password</label>
                  <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                </div>
       
				<div  class="form-label-group" id="jqdata">
					
				</div>

                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit" name="submit">Sign in</button>
                <div class="text-center">
              </form>
            </div>
          </div>
        </div>
</div>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/login.js"></script>
</html>
<?php } ?>