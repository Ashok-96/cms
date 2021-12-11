<?php
include 'db/dbutil.php';
if (isset($_POST['submit'])) {
	$name=$_POST['name'];
  	$pass=md5($_POST['pass']);
  	$cnf=md5($_POST['cnfp']);
  	echo $pass;
  	if ($cnf==$pass) {
			$db=new dbutil();
  		$sql="UPDATE `users` SET `b_flag`=0,`password`='$cnf' WHERE `name`='$name' ";
  		$res=$db->queryRequest($sql);
  		if ($res) {
  		header('Location:manage_users.php?status=unblocked successfully');
  		}else{
  		header('Location:manage_users.php?status=sorry!!!..');

  		}
  	}else{
  		header('Location:manage_users.php?status=please check the password');
  	}
  }  ?>