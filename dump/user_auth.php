<?php
session_start();
require_once('db/dbutil.php');
if (isset($_POST['submit'])) {
if (!empty($_POST['username'])) {
	$username = htmlspecialchars($_POST['username']);
	$password =  htmlspecialchars(md5($_POST['password']));
	$db = new DButil();
$sql = "SELECT * FROM `users` WHERE username='".$username."'";
				$result=$db->queryRequest($sql);
				while ($row=$result->fetch_assoc()) {
					if (($row['password']==$password)&&($row['b_flag']<3) ) {
	          			$_SESSION["name"] = $row['name']; 
        				$_SESSION["userID"] = $row['id'];
        				$_SESSION["mail"] = $row['email'];	
						$_SESSION["user"] = $row['username'];
						$_SESSION["type"] = $row['type'];
						$_SESSION["combination"] = $row['combination'];
						$_SESSION["year"] = $row['year'];

		$s="INSERT INTO `userlog`(`userid`,`name`,`type`)VALUES('".$_SESSION["userID"]."','".$_SESSION["user"]."','".$_SESSION["type"]."')";
		if ($db->queryRequest($s)) {
		  header("Location:home.php");
					}	
    			else{
			  header("Location:home.php?status=sorry");
					}
									}
elseif($row['password']!=$password && $row['b_flag']<3 ){
							$sql="UPDATE `users` SET `b_flag`=b_flag+1 WHERE `username`='$username' OR `email`='$username'";
							$res=$db->queryRequest($sql);
							if ($res) {
								$count=$row['b_flag']+1;
						header("Location:demo.php?count=".$count."&status=Please enter the correct password");				
							}
						}
					elseif ($row['b_flag']==3) {
				header("Location:demo.php?account=".$row['username']."&status=account had been blocked");
						
					}
				}

}else{
	header("Location:demo.php?status=user not found");
					}
					}
				
  ?>