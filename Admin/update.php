<?php
session_start();		$id=$_SESSION['TID'];
include 'db/dbutil.php';
if (isset($_POST['submit'])&&isset($_POST['combination'])) {
	$name=$_POST['name'];
	$combination=$_POST['combination'];
	$year=$_POST['year'];
	$sub=$_POST['subjects'];
  	$count=count($_POST['combination']);
  	if (empty($_POST['combination'])) {
  		echo "string";
  	}else{

     for ($i=0; $i < $count ; $i++) { 
     	$arra[]=$combination[$i]."/".$year[$i]."/".$sub[$i];
     }
    $db=new dbutil();
foreach ($arra as $key => $value) {
	if ($value!="//") {
		$fr[]=$value;

	}
	}
		$var=implode(',', $fr);
	foreach ($arra as $key => $value) {
		$st='SHOW TABLES WHERE `Tables_in_users` REGEXP "'.$value.'"';
	$tr=$db->queryRequest($st);
	if ($tr->num_rows>0){
	$op=md5('edit');
 header('Location:edit-teacher.php?status=success&op='.$op.'&&id='.$id.'');

		
	}else{
		$ncarr[]=$value;
		foreach ($ncarr as $key => $value) {
	  	$cr="CREATE TABLE `$value` (`id` int(5) NOT NULL)";
		$res=$db->queryRequest($cr);
		if ($res) {
			$sql="UPDATE `admin` SET `subjects`='$var' WHERE `name`='$name'";
$res=$db->queryRequest($sql);
if ($res) {
			$sql="CREATE TRIGGER 'class_delete' AFTER DELETE ON `admin` FOR EACH ROW DROP TABLE `$value` ";
$res=$db->queryRequest($sql);
	$op=md5('edit');
}else{
	header('Location:edit-teacher.php?status=sorry?id='.$id.'');
}	$op=md5('edit');
 header('Location:edit-teacher.php?status=creationsuccess&op='.$op.'&&id='.$id.'');
}else{
	header('Location:edit-teacher.php?status=sorry?id='.$id.'');
}
		}
	}
	}
	}
	
	}elseif (isset($_GET['op'])=='delete') {
	$db=new dbutil;
	$id=$_GET['id'];
	$sql="SELECT * FROM `admin` WHERE 	`id`=$id";
	$result=$db->queryRequest($sql);
	while ($row=$result->fetch_assoc()) {
       $var=explode(',', $row['subjects']);
       echo $var[0];
       if (count($var)==1) {
       	$kv=strtolower($var[0]);
       	$sql='DROP TABLE $kv';
       	echo $kv;
	$re=$db->queryRequest($sql);
	if ($re) {
		echo "success";
	}else{
		echo "sorry";
	}

       }else{
       	foreach ($var as $key ) {
       		$kv=strtolower($key);
       	$sql='DROP TABLE `$kv`';
	$re=$db->queryRequest($sql);
	if ($re) {
		echo "success";
	}else{
		echo "sorry";
	}       		
       	}
       }
	}
}
  	
    
  ?>