<?php
include 'db/dbutil.php';
$db=new Dbutil();

$today= new DateTime(date('d-M-Y h:m:s'));
$sql="SELECT * FROM `users` WHERE `id`=1";
$res=$db->queryRequest($sql);

while($row=$res->fetch_assoc()){
print_r($today);
$registration_date=new DateTime('01-01-2020');
print_r($registration_date);
$difference=$registration_date->diff($today);
if ($difference->y>0&&$difference->m) {
echo floor((($difference->y*12)+$difference->m)/6);
}else if($difference->y>0||$difference->m) {
  echo $difference->y.'and'.$difference->m;
  }
}
?>