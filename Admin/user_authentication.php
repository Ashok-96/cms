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
	print_r($res);
	echo $password;
	if ($res->num_rows>0) {
		while($row=mysqli_fetch_assoc($res)){
			if (isset($_POST['classes'])) {
				$_SESSION['Teacher']=$username;
				$_SESSION['class']=$_POST['classes'];
				header('Location:teacher.php');

			}else{
				$_SESSION['admin']=$username;
				header('Location:ahome.php');
			}
		}
}	
}else{
	echo "welcome !";
}
  ?>