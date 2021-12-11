
<?php 
session_start();
if (isset($_SESSION)) {
?>
<!DOCTYPE html>
<html>
<head>

	        <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="js/jquery.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Security-Policy" content="script-src 'self' https://apis.google.com">
<link href="https://fonts.googleapis.com/css2?family=Baumans&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="bootstrap-4.5.0/css/bootstrap.css">
<script type="text/javascript" src="bootstrap-4.5.0/js/bootstrap.js"></script>
<script type="text/javascript" src="bootstrap-4.5.0/js/bootstrap.bundle.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<style >
	#category,#scategory,#details{
		background: transparent;
	}
	  .fa-spin.spin-reverse{
    -webkit-animation-direction:reverse;
    -moz-animation-direction:reverse;
    animation-direction: reverse;
   } 
   .form-control,.form-group,h3{
font-family: 'Baumans', cursive;

   }
</style>
<body>
	<div  id="loader" >
<div style="left: 40%; top: 25%; position: absolute; display: none;" >
      <i style="position: absolute; left: 47px; top: 102px;" class="fa fa-4x fa-cog fa-spin "></i>
      <i style="position: absolute; left: 25.4px; top: 148px;" class="fa fa-3x fa-cog fa-spin spin-reverse"></i><br>
      <i style="position: absolute;  left: 80px; top: 148.7px;" class="fa fa-3x fa-cog fa-spin spin-reverse"></i>
 </div>
 <div>
  <span  style="  position: absolute;
  left: 40%;
  top: 55%;"><b></b></span>
 </div>
</div>
	<?php include'topbar.php';  ?>
<div class="container ">
		<div class="row " id="myDiv" >
	 <img class="col-lg-7 p-3" src="im/support.jpg">
			<div class="col-lg-4">
		<h3>Help Desk <i class="fa fa-question-circle"></i></h3>
<form class="" method="POST" enctype="multipart/form-data" action="<?php echo htmlentities($_SERVER["PHP_SELF"])?>">		
	<div class="form-group ">
		<label for="category"></span></label>
		<input class="form-control"  type="text" name="category" id="category" placeholder="category">
	</div>
	<div class="form-group ">
	
	
		<input class="form-control" type="text" name="scategory" id="scategory" placeholder="Sub category ">
		
	</div>
		<div class="form-group">
	
				
		<textarea name="details" id="details" class="form-control" placeholder="Details Please..." style="height: 10rem;"></textarea>
	</div>
			<div class="form-group">
	
		<label>Attachment (if required) </label>
		<input class="form-control" type="file" name="attachment" id="attachment">
	</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit" name="submit" id="submit" value="submit">Submit</button>
	
			</div>
</form>
</div>
<?php
$nos=date('dmyy');
$con= mysqli_connect("localhost","root","","users");
$folder="attachments/";
 $ids="TKT".str_shuffle($nos);
if (isset($_POST['submit'])) {
	if (!empty($_POST["category"])) {
	$category=htmlspecialchars( $_POST['category']);
	$details=htmlspecialchars( $_POST['details']);
	$scat= htmlspecialchars( $_POST['scategory']);
	$file=$_FILES['attachment']['name'];
	$ftemp=$_FILES['attachment']['tmp_name'];
	$uid=$_SESSION["userID"];
$query=mysqli_query($con,"INSERT INTO `complaints`( `tkt_id`,`userid` ,`category`, `sub_category`,`details`) VALUES ('".$ids."','".$uid."','".$category."','".$scat."','".$details."')");
if ($query) {
	
		move_uploaded_file($ftemp, $folder.$file);
  ?>			
<div class="alert alert-success alert-dismissible fade show mt-0" role="alert">
	Help Esculated successfully 
  <strong><?php echo $ids; ?></strong> is Ticket id for further reference..!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php }else {
	echo '<div class="alert alert-success alert-dismissible fade show mt-0" role="alert">
	Help Esculation is not successful 
  <strong><?php echo $ids; ?></strong> is Ticket id for further reference..!
  <a href="help.php"  data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </a>
</div';
}
}else{
		echo '<div class="alert alert-warning alert-dismissible fade show mt-0" role="alert">
	post is empty 
  <strong><?php echo $ids; ?></strong> is Ticket id for further reference..!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div';
}
}
}
?>
</div>
</div>
</div>


</body>
</html>
