<?php
if (isset($_POST['user'])) {
  	$user=$_POST['user'];
  	include 'db/dbutil.php';
  	$db=new dbutil();
  	$sql="SELECT * `admin` WHERE `username`='$user' OR `email`='$user'";
  	$res=$db->queryRequest($sql);
  	if ($res->num_rows>0) {
  		while ($row=$res->fetch_assoc()) {
  		 $array['type'][]=$row['type'];
  		}
  		echo json_encode($array);
  	}else{
  		$array['msg']='User not found';
  		echo json_encode($array);
  		
  	}
  }  ?>