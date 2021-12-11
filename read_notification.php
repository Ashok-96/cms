<!DOCTYPE html>
<head>
	      <meta name="viewport" content="width=device-width, initial-scale=1">

	<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/popover.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="bootstrap-4.5.0/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="bootstrap-4.5.0/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Baumans&display=swap" rel="stylesheet">
<script type="text/javascript" src="bootstrap-4.5.0/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/sdashboard.js"></script>
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.css"/>
<script type="text/javascript" src="js/jquery.datatables.min.js"></script>
<script type="text/javascript" src="js/datatables.bootstrap4.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>
	  body,label,.form-control,img{

      font-family: 'Josefin Sans', sans-serif;
  }
</style>
	<title>Read Notifications</title>
</head>
<html>
<?php
	session_start();
if (isset($_GET['type'])&&isset($_GET['id'])) {
	include 'db/dbutil.php';
	$uid=$_SESSION['userID'];
	$nid=$_GET['id'];
	$sql="UPDATE `notification` SET `status`='Seen' WHERE `SID`='$uid' AND `id`='$nid'";
	$db = new dbutil();
	$res=$db->queryRequest($sql);
	if ($res) {
	$query="SELECT * FROM `notification` WHERE `SID`='$uid' AND `status`='Seen' AND `id`='$nid'";
	$res1=$db->queryRequest($query);
	?>

<body>
<?php include 'topbar.php';  ?>
<div class="container">
	<div class="d-flex">
		<?php
		while ($row=$res1->fetch_assoc()) {
			echo "<h2>".$row['category']."</h2>";
			echo "<p>".$row['sub_category']."</p>";

		}
		?>
	</div>
</div>

<?php }
	}else{
?>	
<?php
	include 'db/dbutil.php';
	 include 'topbar.php';  ?>
</div>
<div class="container">
<div class="row">
	<?php
    $uid=$_SESSION['userID'];
	$db=new dbutil();
	$sql="SELECT * FROM `notification` WHERE `SID`='$uid' AND `status`='Seen'" ;
	$res=$db->queryRequest($sql);
	while($row=$res->fetch_assoc()){
		$t=date('hm');
		$d=strtotime($t);
		 ?>
	<div class="col-lg-12 d-flex">
		<div class="p-3">
<img src="https://ui-avatars.com/api/?name=<?php echo $row['category']?>&rounded=true&bold=true&background=<?php echo substr($d,6) ?>&color=fafbfc" class="p-2"></div>
<div class="pt-4 col-lg-6">
	<div class="h4"><?php echo $row['category']; ?>&nbsp;</div><span class='text-muted'><?php echo date('D d:m:yy H:s:i',strtotime($row['time'])); ?></span>
	<div class="dropdown-divider"></div>
	<?php echo "<p >".$row['message']."</p>"; ?>
</div>

	</div>
	<?php }
 ?>
</div>	
</div>	


<?php 
} ?>
</body>
</html>