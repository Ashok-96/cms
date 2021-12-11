<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>
<?php
	$conn=mysqli_connect("localhost","root","","users");
session_start();
$a=$_SESSION["user"];
$re = mysqli_query($conn,"SELECT * FROM `userlog` WHERE `logout`='' ");
	 while ($res=mysqli_fetch_array($re)) {
	    $_SESSION['ide'] = $res['id']."<br>";
	   }
$k=$_SESSION["ide"];

date_default_timezone_set('Asia/Kolkata');
$time = date ("d-m-yy H:i:s");
$sql=mysqli_query($conn,"UPDATE `userlog` SET `logout`='$time' WHERE `id`='$k'");
if ($sql) {	
session_unset();
session_destroy();		
        ob_clean();
        header("location:demo.php");
        }


?>
