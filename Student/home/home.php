<?php
session_start();
include('../Common files/db/dbutil.php');
$db=new dbutil();
$res=[];
date_default_timezone_set('asia/kolkata');
if(isset($_POST['home'])){
  if(isset($_SESSION['user'])){

  $sql="SELECT `semester` FROM `registration` WHERE `username`='".$_SESSION['user']."'";
  $qes=$db->queryRequest($sql);
while($row=$qes->fetch_assoc()){
  $res['semester']=$row['semester'];
}
$sql_2="SELECT * FROM `subjects` WHERE `semester`='".$res['semester']."'";
$qes_2=$db->queryRequest($sql_2);
$res['subjects']=$qes_2->num_rows;
  $res['user']=$_SESSION['name'];
  echo json_encode($res);
  }else{
    header('Location:../login');
  }
  
}
