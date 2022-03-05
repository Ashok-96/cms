<?php
require 'db/dbutil.php';
$db=new Dbutil();
$status=array('0' => 'Absent','1' => 'Present' );
date_default_timezone_set('Asia/kolkata');		
for($i=1;$i<32;$i++){
$month=rand(1,12);
  $day=date('l',mktime(0, 0, 0, 01,$i,20));
  if ($day=='Sunday' || $day=='Saturday') {
  $act_date=date('d-M-Y', mktime(0, 0, 0, 02,$i+2, 20));
  }else{
  $act_date=date('d-M-Y', mktime(0, 0, 0, 02,$i, 20));

  echo $act_date."<br>"; 
  }
}

$sql=$db->queryRequest("SELECT `id` FROM `bca/3/cryptography_and_networksecurity`");
  ?>

  ROW_FORMAT=DYNAMIC;