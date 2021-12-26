  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<div class="container">
	<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.css"/>

<table class=" table col-lg-9 table-bordered">
	


<?php
error_reporting(0);
session_start();
print_r($_SESSION);
if (isset($_GET["id"])) {
	if ($_SESSION["type"]==1) {
		# code...
	$tktid=$_GET["id"];
     $con=mysqli_connect("localhost","root","","users");	
        $uid=$_SESSION["userID"];
   $query=mysqli_query($con,"SELECT * FROM `complaints`WHERE `userid`='$uid' AND `tkt_id`='$tktid' ");
                while ($row=mysqli_fetch_array  ($query)) {
?>
	<?php echo "<h3>".$tktid."</h3>";?>
<tr>
<th>Category</th>
<td> <?php echo $row["category"];  ?> </td>
</tr>
<tr>
<th>SubCategory</th>
<td> <?php echo $row["sub_category"];  ?> </td>
</tr>
<tr>
<th>Details</th>
<td><p> <?php echo $row["details"];  ?></p> </td>

</tr>
<tr>
<th>Registered date</th>
<td><p> <?php echo $row["time"];  ?></p> </td>
</tr>
<tr>
<th>Closed date</th>
<td><p> <?php echo $row["cdate"];  ?></p> </td>
</tr>

<th>Status</th>
<p> <?php $stage=$row["stage"]; if ($stage=="Esculated") {
	
echo "<td class='text-danger'><b>".$stage."</td>";}
else{
echo "<td class='text-info'><b>".$stage."</td>";

}?></p> 
</tr>
<tr>
<th>Remarks</th>
<td><p> <?php echo $row["resolution"];  ?></p> </td>
</tr>
<?php                }

	}elseif (isset($_SESSION['admin'])||isset($_SESSION['Teacher'])){
			$tktid=$_GET["id"];
			echo'about to go';
     $con=mysqli_connect("localhost","root","","users");	
       
        $query=mysqli_query($con,"SELECT * FROM `complaints`  WHERE  `tkt_id`='$tktid' ");
                while ($row=mysqli_fetch_array  ($query)) {
?>
	<?php echo "<h3>".$tktid."</h3>";?>
	<?php
$uid=$row["userid"];

$query1=mysqli_query($con,"SELECT * FROM `users`  WHERE  `id`='$uid' ");
                while ($res=mysqli_fetch_array  ($query1)) {
?>
<th>UserID</th>
<td> <?php echo $row["userid"];  ?> </td>
</tr>	
<th>Name</th>
<td> <?php echo $res["name"];  ?> </td>
</tr>
<th>Register_number</th>
<td> <?php echo $res["reg_no"];  ?> </td>
</tr>	
<th>Combination</th>
<td> <?php echo $res["combination"];  ?> </td>
</tr>
<?php } ?>
<tr>

<th>Category</th>
<td> <?php echo $row["category"];  ?> </td>
</tr>
<th>Time</th>
<td> <?php echo date("D d-M-yy H:i:s",strtotime($row["Time"]));  ?> </td>
</tr>	
<tr>
<th>SubCategory</th>
<td> <?php echo $row["sub_category"];  ?> </td>
</tr>
<th>Details</th>
<td><p> <?php echo $row["details"];  ?></p> </td>
</tr>
<th>Status</th>
<td><p> <?php echo $row["stage"];  ?></p> </td>
</tr>
<th>Closed date</th>
<td><p> <?php echo date("D d-M-yy H:i:s",strtotime($row["c_date"]));  ?> </p> </td>
</tr>
<th>Remarks</th>
<td><p> <?php echo html_entity_decode( $row["resolution"]);  ?></p> </td>
</tr>
<?php                }
}
}
?>
</table>
</div>