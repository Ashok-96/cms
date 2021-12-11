<?php
  if (isset($_POST["id"])) {	
$id=$_POST["id"];
$con=mysqli_connect("localhost","root","","users");
$sql=mysqli_query($con,"DELETE FROM `mail` WHERE `id`=$id");
if($sql){
	echo "success";
}
}
  ?>