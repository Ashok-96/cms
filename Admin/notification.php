<?php
   session_start();
if (!isset($_SESSION)){
header("Loaction:index.php");
}else{ 
	include 'db/dbutil.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Notification</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<?php include('topbar.php');?>
</head>
<body >

<div class=" container" id="content">
<div class="row">
	<div class="col-lg-8" style="background: rgba(0,0,0,.038);" >
		<img class="col-lg-10" src="im/not.png" >
		
	</div>
	<div class="card col-lg-4 " > 
		<div class="form-group " >
<?php if (isset($_SESSION['Teacher'])) {
	$var=explode('/', $_SESSION['class']);
?>
<label><b> Combination</b></label>
<input class="form-control bg-white" readonly type="text" name="combination" id="combination" value="<?php echo $var[0] ?>">
<?php }else{  ?>
	<div class="form-group mb-2">
			<label><b> To </b></label>
<select class="form-control" id="select" placholder="to whom">
	<option>-----Select-----</option>
	<option>All</option>
	<?php $con=mysqli_connect("localhost","root","","users");
	$query=mysqli_query($con,"SELECT DISTINCT `combination` FROM `users` WHERE `type`=1");
	while ($row=mysqli_fetch_assoc($query)) {
		echo "<option>".$row["combination"]."</option>";
	
}
	?>
<?php }  ?>

</select>
	<div class="form-group ">

<?php if (isset($_SESSION['Teacher'])) {
	$var=explode('/', $_SESSION['class']);
?>
<label><b> Year</b></label>
<input class="form-control bg-white" readonly type="text" name="year" id="year" value="<?php echo $var[1] ?>">
<?php }else{  ?>
<label><b> year</b></label>
			
<select class="form-control" id="year" placholder="to whom">
	<option>-----Select-----</option>
	<option>All</option>
	<?php $con=mysqli_connect("localhost","root","","users");
	$query=mysqli_query($con,"SELECT DISTINCT `year` FROM `users` WHERE `type`=1");
	while ($row=mysqli_fetch_assoc($query)) {
		echo "<option>".$row["year"]."</option>";

	}

	?>
</select>
<?php }  ?>
	
</div>

		</div>
	<div class="form-group mb-2">
			<label><b> Category</b></label>
			    <input type="text" id="category" class="form-control" name="category" placeholder="Please enter the appropriate value">

		</div>
			<div class="form-group mb-2">
			<label><b>Sub-Category</b></label>
			    <input type="text" id="subcategory" class="form-control" name="subcategory" placeholder="Please enter the appropriate value">

		</div>
		<div class="form-group mb-2">
			<label><b>Message</b></label>
			   <textarea name="message" id="message" class="form-control" placeholder="message to be conveyed"
			   style="height: 150px;"></textarea>

		</div>

			<div class="form-group mb-2">
<button id="submit" class="btn btn-outline-success " value="send">Notify</button>
		</div>
</div>

</body>
<?php if (isset($_SESSION['Teacher'])) {
?>
<script >	
	$(function(){
$("#submit").click(function(){
	var se=$("#submit").val();
var year=$("#year").val();
	var comb=$("#combination").val();
	var category=$("#category").val();
	var subcat=$("#subcategory").val();
	var msg=$("#message").val();
	$.post("send.php",{submit:se,
		select:comb,
		year:year,
		category:category,
		subcategory:subcat,
		message:msg},
		function(data,status){	
    $("#Alert").modal('toggle');
    $("#body").html(data);
    $("#close").click(function(){
    	window.location.href="";
    });
			
});
	});
});
</script>
<?php }else if (isset($_SESSION['admin'])) 
{  ?>
<script >	
	$(function(){
$("#submit").click(function(){
	var se=$("#submit").val();
var year=$("#year option:selected").val();
	var comb=$("#select option:selected").val();
	var category=$("#category").val();
	var subcat=$("#subcategory").val();
	var msg=$("#message").val();
	$.post("send.php",{submit:se,
		select:comb,
		year:year,
		category:category,
		subcategory:subcat,
		message:msg},
		function(data,status){	
    $("#Alert").modal('toggle');
    $("#body").html(data);
    $("#close").click(function(){
    	window.location.href="";
    });
			
});
	});
});
</script>
<?php }  ?>

</div>
  <div class="modal fade" role="dialog" id="Alert">
    <div class="modal-dialog">
      <div class="modal-content">
		      <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-exclamation-triangle"></i> Alert</span></h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body text-center" id="body">
        	
        </div>
        <div class="modal-footer">
        	<button class="btn btn-success" data-dismiss="modal" id="close">Okay</button>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- Footer -->
</html>
<?php } ?>
