<?php 
if (isset($_POST["table"])&&isset($_POST["combination"])&&isset($_POST["year"])) {
	$combination=$_POST["combination"];
	$year=$_POST["year"];
	$table=$_POST["table"];
$con=mysqli_connect("localhost","root","","users");
$query=mysqli_query($con,"INSERT INTO `$table`(`id`,`name`,`reg_no`) SELECT `id`,`name`,`reg_no` FROM `admin` WHERE
	`combination`='$combination' AND `year`='$year' AND `type`=1");
if ($query) {
		
	echo "success";
	
	}else{
		echo "sorry already done";
	}
}

	