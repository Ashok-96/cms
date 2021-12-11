<?php
if (isset($_POST['id'])) {
	require'db/dbutil.php';
	$id=$_POST['id'];
	$db=new dbutil();
	$sql="SELECT * FROM `notification` where `SID`='$id' AND `status`!='Seen' ORDER BY `category` DESC";
	$res=$db->queryRequest($sql);
	while ($row=$res->fetch_assoc()) {
		$array["title"][]=$row['category'];
		$array["category"][]=$row['sub_category'];	

}
echo json_encode($array);
}
?>