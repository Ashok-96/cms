		<?php
		require_once('../Common files/db/dbutil.php');
		session_start();
		ob_start();
		/*functional part*/
		if (isset($_POST['submit'])) {   
			$username = htmlspecialchars($_POST['username']);
			$password = MD5(htmlspecialchars($_POST['password']));
			$db = new dbutil();
	
			$sql = "SELECT * FROM `registration` WHERE `Username`='".$username."' and `password` ='".$password."'";
				$result=$db->queryRequest($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$_SESSION["userID"] = $row['id'];
								$_SESSION["name"] = $row['Firstname']." ".$row['Lastname'];
								$_SESSION["user"] = $row['Username'];
														header( "refresh:0.1; url=../home/" );

					}
				}else if ($result->num_rows==0){
											header( "refresh:0.1; url=../login" );
				}
				
					
				}		

		?>
		
		</body>
		</html>
		<?php   ?>