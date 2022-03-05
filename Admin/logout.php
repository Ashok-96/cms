<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>
<?php 	
session_start();
session_unset();
session_destroy();        
header("location:index.php");

        


?>
