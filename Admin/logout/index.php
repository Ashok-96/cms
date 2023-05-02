
<?php
	$conn=mysqli_connect("localhost","root","","users");
session_start();
$a=$_SESSION["user"];	
session_unset();
session_destroy();		
        ob_clean();
        header("location:../");
        


?>
