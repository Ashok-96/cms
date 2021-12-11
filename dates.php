<?php
session_start();
 if (isset($_POST["table"])) {
 include 'db/dbutil.php';
  $class=$_POST["table"];
$name=$_SESSION['userID'];
$db=new dbutil();
$date=date('y');
$sql="SHOW COLUMNS FROM `$class` WHERE `Field` REGEXP '$date'";
$res=$db->queryRequest($sql);
while ($date=$res->fetch_assoc()) {
  $dates[]=$date["Field"];
};
foreach ($dates as $key ) {
  $array['dates'][]=$key;
$sql1="SELECT * FROM `$class` WHERE `id`='$name'";
$res=$db->queryRequest($sql1);
while ($row=$res->fetch_assoc()) {
    $array['statuses'][]=$row[$key];

  }
}
$class=explode('/', $_POST["table"]);
$array['class'][]=$class[2];
echo json_encode($array);   
}  ?>