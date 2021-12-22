<?php
require 'db/dbutil.php';
	$db=new dbutil();
if (isset($_POST['submit'])) {
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$sql = "SELECT * FROM `admin` WHERE `username`='".$username."' AND  `password` ='".$password."'";
	$res=$db->queryRequest($sql);
	if ($res->num_rows>0) {
if (isset($_POST['classes'])) {
	session_start();
	$_SESSION['Teacher']=$username;
	$_SESSION['class']=$_POST['classes'];
 header('Location:./teacher.php');
			// code...
}else{
	session_start();
	$_SESSION['admin']=$username;
 header('Location:./ahome.php');
	

}
		}	
}else{
	echo "welcome !";

}
  ?>