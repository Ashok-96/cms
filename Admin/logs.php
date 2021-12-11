<?php
   session_start();
if (!isset($_SESSION["admin"])) {
    header("Location:index.php");
}
 else {
 	include 'db/dbutil.php';
 ?>


 <html>
<head>
<style >
	select{
		border: 2px solid black;
		width: 100%;

	}

</style>

	<title>Tracker</title> 
	
	      <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.css"/>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="js/jquery.datatables.min.js"></script>
<script type="text/javascript" src="js/datatables.bootstrap4.min.js"></script>
</head>
<style>
	
</style>
	<?php include('topbar.php');?>
<body>
<div class="container">
<div class="row">
	<div class="col-lg-8 card p-2 mt-2 shadow">	
	<table class="table table-bordered " >
	<thead class="thead p-3">
		<th><i class="fa  fa-key "> ID</i></th>
		<th><i class="fa  fa-user "> Name</i></th>
		<th><i class="fa  fa-clock-o "> Login</i></th>
		<th><i class="fa  fa-clock-o "> Logout</i></th>

	</thead>
	<tbody>
	<?php
	$conn = mysqli_connect("localhost","root","","users");
	$re = mysqli_query($conn,"SELECT * FROM `userlog` WHERE `type`='1' ORDER BY `login` DESC
" );

	 while ($result=mysqli_fetch_array($re)) {
	?>
	<tr>
	<td ><strong><?php echo $result['id'];?></strong></td>
	<td ><strong><?php echo $result['name'];?></strong></td>
	<td ><strong><?php echo date("d-M-yy H:s:i",strtotime($result['login']));?></strong></td>
	<td ><strong><?php echo date("d-M-yy H:s:i",strtotime($result['logout']));?></strong></td>
		</tr>
<?php }?>
		</tbody>
	</table >
	</div>
<div class="col-lg-4">
	<img class="col-lg-auto" src="../im/clock.jpg">
</div>
</div>
</div>
</div>

</form>

</body>
<script >
	$(function(){
	$('table').DataTable({
           "aaSorting": []
	});	
	})
</script>
  </footer>
</html>
<?php } ?>
