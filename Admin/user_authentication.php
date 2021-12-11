
<?php
if (isset($_POST['submit'])) {
if (isset($_POST['classes'])) {
	if ($_POST['classes']=='---selectclass---') {
		header("Location:index.php?please select class");
	}else{
$sub=$_POST['classes'];
	$username=$_POST['username'];
	$password=md5($_POST['password']);
 	require 'db/dbutil.php';
 	$db=new dbutil();
 	session_start();
$sql = "SELECT * FROM `admin` WHERE username='$username' AND  `password` ='$password'";
				$result=$db->queryRequest($sql);
				if ($result->num_rows > 0){
    			while($row = $result->fetch_assoc()) {
        			if( ($row['username'] == $username ||$row['email'] == $username) && $row['password'] == $password ){
        				$_SESSION["Teacher"] = $row['name'];
        				$_SESSION["class"]=$sub; 
			header("Location:teacher.php");
}else{
			header("Location:index.php?status=sorry");

		}
}
}
}
}else{
	
	$username=$_POST['username'];
	$password=md5($_POST['password']);
 	require 'db/dbutil.php';
 	$db=new dbutil();
 	session_start();
$sql = "SELECT * FROM `admin` WHERE username='$username' AND password ='".$password."'";
				$result=$db->queryRequest($sql);
				if ($result->num_rows > 0){
    			while($row = $result->fetch_assoc()) {
        			if( ($row['username'] == $username ||$row['email'] == $username) && $row['password'] == $password ){
        				$_SESSION["admin"] = $row['name'];
			header("Location:ahome.php?status=success");
}else{
			header("Location:index.php?status=sorry");

		}
}
}
}
}
?>