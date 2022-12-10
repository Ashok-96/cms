<?php
session_start();

 if (isset($_POST["table"])) {
 include 'db/dbutil.php';
  $class=$_POST["table"];
$id=$_SESSION['userID'];
$db=new dbutil();
$date=date('y');

$sql="SHOW COLUMNS FROM `$class`";
try {
$res=$db->queryRequest($sql);
if ($res->num_rows>0) {
while ($date=$res->fetch_assoc()) {
  $dates[]=$date["Field"];
};
foreach ($dates as $key ) {
  $array['dates'][]=$key;
$sql1="SELECT * FROM `$class` WHERE `id`='$id'";
$res=$db->queryRequest($sql1);
while ($row=$res->fetch_assoc()) {
    $array['statuses'][]=$row[$key];
  }
}
$class=explode('/', $_POST["table"]);
echo json_encode($array);   
}  
} catch (Exception $e) {
echo $e->getMessage(); 
}

}  ?>