
<?php 
if (isset($_SESSION)) {
?>
<!DOCTYPE html>
<html>
<head>

	        <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css2?family=Baumans&display=swap" rel="stylesheet">


<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<style >
	</style>
<div class="container ">
	<?php if (isset($_GET['status'])) {
	 ?>
<div class="alert alert-success alert-dismissible fade show mt-0" role="alert">
	Help Escalated successfully 
  <strong><?php echo $_GET['ref']; ?></strong> is Ticket id for further reference..!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>
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
<button onclick="myFunction('!hi')">clck</button>
<div id="snackbar">Some text some message..</div>
</div>
<script >
	
  function myFunction(str) {
  // Get the snackbar DIV
  var x = document.getElementById("snackbar");
  // Add the "show" class to DIV
  x.className = "show";
  x.innerHTML=str;
  // After 3 seconds, remove the show class from DIV
  setTimeout(function(){ x.className = x.className.replace("show", ""); 
window.location.href='./tickets.php';}, 1800);
}
$(document).ready(function() {
	
})
</script>
<?php
$db = new DButil();
$nos=date('dmyyhms');
$con= mysqli_connect("localhost","root","","users");
$folder="./attachments/";
 $ids="TKT".str_shuffle($nos);
if (isset($_POST['submit'])) {
if (!empty($_POST["category"])) {
	$category=htmlspecialchars( $_POST['category']);
	$details=htmlspecialchars( $_POST['details']);
	$scat= htmlspecialchars( $_POST['scategory']);
	$file=$_FILES['attachment']['name'];
	$ftemp=$_FILES['attachment']['tmp_name'];
	$uid=$_SESSION["userID"];
$query="INSERT INTO `complaints`( `tkt_id`,`userid` ,`category`, `sub_category`,`details`) VALUES ('".$ids."','".$uid."','".$category."','".$scat."','".$details."')";
$res=$db->queryRequest($query);
	if ($res) {
		?>
		
		<script >
			var result="<?php echo $ids;?> Ticket had been raised";
			myFunction(result)
	</script>


<?php		
 }else {
 	?>
		<script >myFunction('!hi done')</script>
	
<?php
}
}
}

ob_flush();
}
?>
</div>
</div>
</div>
</body>
</html>
