<?php
session_start();
if (!isset($_SESSION['admin'])) {
  	header("Location:index.php");
  }  
include 'db/dbutil.php';
  	?>
<!DOCTYPE html>
                  <meta name="viewport" content="width=device-width, initial-scale=1">
<html>
<meta charset="utf-8" content="">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.css"/>
<script type="text/javascript" src="js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery.js"></script>

<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<head>
	<title>Manage users</title>
</head>
<body style="background: rgba(0,0,0,0.02);">
<?php include 'topbar.php';  ?>
<div class="container">
	<div class="row">
		<div class="col-lg-4 justify-content-between">
			<img class="col-lg-auto" src="../im/muser.png">
		</div>
		<div class="col-lg-8 table-responsive p-2">
			
			<table class="table table-bordered" id="data">
				<thead>
					
				<th>Name</th>
				<th>Year</th>
				<th>Combination</th>
				<th>Status</th>
				<th>action</th>
				</thead>
				<tbody>
					<?php 
					$db=new dbutil();
					$sql="SELECT * FROM `users`";
					$res=$db->queryRequest($sql);
					while ($row=$res->fetch_assoc()) {
						echo "<tr>";
						echo "<td>".$row['name']."</td>";
						echo "<td>".$row['year']."</td>";
						echo "<td>".$row['combination']."</td>";
						if ($row['b_flag']==3) {
						echo "<td> <a class='text-danger text-bold'>locked</a></td>";
						echo "<td><a class='btn btn-success' href='manage_users.php?op=unblock&id=".$row['id']."'><i class='fa fa-unlock'></i> unblock</a></td>";
						}else{
							echo "<td>------------</td>";
							
							echo "<td>------------</td>";
						}

					}
					 ?>
				</tbody>
   
			</table>
		</div>
		<?php
		if (isset($_GET['op'])) {
			if ($_GET['op']=='unblock') {	
				$id=$_GET['id'];
					$sql="SELECT * FROM `users` WHERE `id`='$id' AND `b_flag`=3 ";
					$res=$db->queryRequest($sql);	
					while ($row=$res->fetch_assoc()) {
						
					
		 ?>
		 <div class="col-lg-8">
		 	
		 <form method="POST" action="unblock_user.php">
		 	<div class="form-group">
		 	<label for="name">Name:</label>
		 		<input class="form-control bg-white" type="text" name="name" readonly value="<?php echo $row['name'] ?>">
		 	</div>
		 			 	<div class="form-group">
		 	<label for="name ">Register no:</label>
		 		<input class="bg-white form-control" type="text" name="regno" value="<?php echo $row['reg_no'] ?>" readonly>
		 	</div>
		 			 	<div class="form-group">
		 	<label for="name">Temproary Password</label>
		 		<input class="form-control" type="password" name="pass" >
		 	</div>
		 	<div class="form-group">
		 	<label for="name">confirm passowrd:</label>
		 		<input class="form-control" type="passowrd" name="cnfp">
		 	</div>
		 	<input type="submit" name="submit" value="submit">
		 </form>
		<?php } 
		} 
	}?>
		 </div>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/jquery.datatables.min.js"></script>
<script type="text/javascript" src="js/datatables.bootstrap4.min.js"></script>
	</div>
	<script >
		$(function(){
			$("#data").DataTable();
		})
	</script>
</div>
</body>
</html>