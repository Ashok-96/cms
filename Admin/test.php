
<?php
include 'db/dbutil.php';
session_start();
if (isset($_POST['id'])) {
	 $arrayName = array('class' =>$_SESSION['class'] );
	 $arrayName["id"]=$_POST['id'];
	 $arrayName["status"]=$_POST['status'];

$db=new Dbutil();

$sql='UPDATE `'.$arrayName["class"].'` SET `'.date('d-M-Y').'`="'.$arrayName["status"].'" WHERE `id`="'.$arrayName["id"].'"';
$res=$db->queryRequest($sql);
if ($res) {
	$sql='SELECT `id` FROM `'.$arrayName["class"].'` WHERE `'.date('d-M-Y').'`="Present"';
$res=$db->queryRequest($sql);
if ($res) {
$arrayName["strength"]=$res->num_rows;
}
}
}
	echo json_encode($arrayName);
  ?>