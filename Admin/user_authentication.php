<?php
require 'db/dbutil.php';
	$db=new dbutil();
	session_start();	
	$username=$_POST['username'];
	$password=md5($_POST['password']);
if (isset($_POST['submit'])) {
		print_r($_POST);
	$sql = "SELECT * FROM `admin` WHERE `username`='".$username."' AND `password`='".$password."'";
	$res=$db->queryRequest($sql);

	if ($res->num_rows>0) {
		while($row=mysqli_fetch_assoc($res)){
		
				$_SESSION['admin']=$username;
				header('Location:./home/');
			
		}
}	
}else{
	echo "welcome !";
}
  ?>