<?php
include('../../Common files/db/dbutil.php');
$db=new dbutil();
$result=[];

if(isset($_GET['department'])){
    $sql="SELECT `name` FROM `admin` WHERE `Department`='".$_GET['department']."'";
    $res=$db->queryRequest($sql);
    while($row=$res->fetch_assoc()){
        $result['Teachers'][]=$row['name'];
    }
echo json_encode($result);
}
if(isset($_POST['teacher'])){
   $sql="UPDATE `subjects` SET `Teacher`='".$_POST['teacher']."' WHERE `subject_code`='".$_POST['subject_id']."'";
   $res=$db->queryRequest($sql);
   if($res){
       $result['Success']="Assigned Successfully!";
   }else{
  echo $result['Error']="Something went wrong!";

   }

echo json_encode($result);
}
?>  