<?php
if (isset($_POST['submit'])) {
include 'db/dbutil.php';
$db=new dbutil();
$name=$_POST['name'];	
$phone=$_POST['phone'];
$user=$_POST['username'];
$pass=$_POST['password'];
foreach ($_POST['class'] as $key) {
$subjects[]=$key;
	$cr="CREATE TABLE `$key` (`id` int(5) NOT NULL)";
		$res=$db->queryRequest($cr);
		if ($res) {
			$var=implode(",",$subjects);
$sql='INSERT INTO `admin` (`name`,`phone`,`subjects`,`username`,`password`)VALUES("'.$name.'","'.$phone.'","'.$var.'","'.$user.'","'.md5($pass).'")';
$res=$db->queryRequest($sql);
if ($res) {
header("Location:ahome.php?status=success");	

}else{
header("Location:ahome.php?status=sorry");

}
		}else{
header("Location:ahome.php?status=sorry");	
		}
}

}
  ?>