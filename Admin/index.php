<!DOCTYPE html>
<html>
<head>
	<?php 
session_start();
ob_start();
if (isset($_SESSION["admin"])||isset($_SESSION['Teacher'])) {
	echo "working";
	header("Location:ahome.php");
  } 
  else{
  
  	?>	        <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Baumans&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.css"/>
<link rel="stylesheet" type="text/css" href="css/blogin.css">
	<title>Admin pannel</title>
</head>
<body>
<div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image pl-2"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4">Welcome back!</h3>
              <form method="post" action="<?php echo htmlspecialchars('user_authentication.php',ENT_QUOTES) ?>">
                <div class="form-label-group">
                  <input type="text" id="username" name="username" class="form-control" placeholder="username/email" required autofocus>
                  <label for="username">username/email</label>
                </div>

                <div class="form-label-group">
                  <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                  <label for="password">Password</label>
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