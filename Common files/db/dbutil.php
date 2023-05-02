<?php
date_default_timezone_set('Asia/Kolkata');
const USERNAME = "root";
const PASSWORD = "";
const HOST = "localhost";
const DATABASE = "users";

 class DButil {
	 	function queryRequest($sql){
		$conn= new mysqli(HOST,USERNAME,PASSWORD,DATABASE);
		if($conn->connect_error){	
			die('Connection Failed :'.$conn->connect_error);
		}else{
		$result = $conn->query($sql);
		$conn->close();
		}
		return $result;
	}
	function multiQuery($sql){
		$conn= new mysqli(HOST,USERNAME,PASSWORD,DATABASE);
	if($conn->connect_error){
		die('Connection Failed :'.$conn->connect_error);
	}else{
	$result = $conn->multi_query($sql);
	if($result){

		do{
			if($s_result=$conn->store_result()){
				while($row=$s_result->fetch_row()){
					$res['result'][]=$row[0];
					
				}

			}
		}while ($conn -> next_result());
		
	}
	$conn->close();
	}
	return $res;
}
 }

?>