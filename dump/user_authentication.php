
<?php
/*functional part*/
require_once('db/dbutil.php');
if (isset($_POST['submit'])) {
if (!empty($_POST['username'])) {
	$username = htmlspecialchars($_POST['username']);
	$password =  htmlspecialchars(md5($_POST['password']));
	$db = new DButil();
$sql = "SELECT * FROM `users` WHERE username='".$username."' or Email='".$username."' and password ='".$password."'";
				$result=$db->queryRequest($sql);
				if ($result->num_rows > 0){
    			while($row = $result->fetch_assoc()) {
        			if( ($row['username'] == $username ||$row['email'] == $username) && $row['password'] == $password ){
        				$_SESSION["name"] = $row['name']; 
        				$_SESSION["userID"] = $row['id'];
        				$_SESSION["mail"] = $row['email'];	
						$_SESSION["user"] = $row['username'];
						$_SESSION["type"] = $row['type'];
						$_SESSION["combination"] = $row['combination'];
						$_SESSION["year"] = $row['year'];

		$s="INSERT INTO `userlog`(`userid`,`name`,`type`)VALUES('".$_SESSION["userID"]."','".$_SESSION["user"]."','".$_SESSION["type"]."')";
		if ($db->queryRequest($s)) {
		  header("Location:home.php?status=success&id=".$row['id'].	"");
					}	
    			}else{
			 	header("Location:demo.php?status=sorry");

					}	
    		
   			
}
}else{
	header("Location:demo.php?status=sorry");
					}
					}
}
  ?>