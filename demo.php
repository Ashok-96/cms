<?php 
session_start();
ob_start();
if (isset($_SESSION["type"])) {
	echo "working";
	header("Location:home.php");
  } 
  else{
  
  	?>
<html>
<head>
	<title>User Authentication</title>
	        <meta name="viewport" content="width=device-width, initial-scale=1">

	  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="bootstrap-4.5.0/css/bootstrap.min.css">  
 <script src="js/jquery.js"></script>
  <script src="bootstrap-4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/login.css">
</head>


<body  >
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9  col-lg-5 mx-auto ">
        <div class="card card-signin my-5 ">
          <div class="card-body">
              <?php if (isset($_GET['account'])&&isset($_GET['status']) ) {
        if (!is_null($_GET['account'])) {
                ?>
            <div class="alert alert-danger">
                <?php echo $_GET['status'];?>
            </div>
            <?php  } 
            } ?>
<?php if (isset($_GET['count'])&&isset($_GET['status']) ) {
        if (!is_null($_GET['status'])) {
                ?>
            <div class="alert alert-danger">
                <?php
                $count=3-$_GET['count'];
                                if ($count==0) {
                 echo "Your account is bocked !!!";
                  echo "</div>";
                }
                elseif ($count==1) {
                 echo $_GET['status']."<br>".$count." attempt left!";
                  echo "</div>";
                }else{

                 echo $_GET['status']."<br>".$count." attempts left!";?>
            </div>
            <?php
                }
              } 
            } ?>
            <h5 class="card-title text-center">Sign In</h5>
            <form class="form-signin" method="post" action="<?php echo htmlentities('user_auth.php'); ?>">
              <div class="form-label-group">
                <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail"><i class="fa fa-user-circle"></i> Email / Username</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <label for="inputPassword"><i class="fa fa-lock"></i> Password</label>
              </div>
              <button class="btn btn-success px-5 " name="submit" type="submit">LOGIN</button>
              <hr class="my-4">
              <a href="register.php" class="btn btn-lg  btn-block btn-primary " type="submit"><i class="fa fa-address-book"></i> For Registration! Click here</a>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>



  </div> 
   <script >
		$(function(){
		setTimeout(function(){
		$("#loader").hide();		
		$("#container").show();	
		$("body").css({});	
		

	},2000);
	});
	</script> 

</div>

</body>
</html>
<?php }?>