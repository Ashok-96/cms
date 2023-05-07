<?php
$op=[];
include('../../Common files/db/dbutil.php');
$db=new DButil();
if (isset($_POST['Teachers'])) {
  $sql="SELECT * FROM `teachers`";
  $res=$db->queryRequest($sql);
while($row=$res->fetch_assoc()){
    $op['id'][]=$row['id'];
    $op['Firstname'][]=$row['Firstname'];
    $op['Lastname'][]=$row['Lastname'];
    $op['Department'][]=$row['Department'];


}
echo json_encode($op);
}
if(isset($_POST['Dept_list'])){
  $sql="SELECT * FROM `departments`";
  $res=$db->queryRequest($sql);
  while($row=$res->fetch_assoc()){
    $op['Combin_list'][]=$row['department'];
  }
 
  echo json_encode($op);

}
if(isset($_POST['save'])){
  $sql="INSERT INTO `teachers`( `Firstname`,`Lastname`,`Gender`, `phone`, `username`, `password`, `Department`) VALUES ('".$_POST['Firstname']."','".$_POST['Lastname']."','".$_POST['Gender']."', '".$_POST['phone']."','".$_POST['username']."','".$_POST['password']."','".$_POST['Department']."')";
  $res=$db->queryRequest($sql);
  if($res){
    header('Location:./index.html?status=success');
  }else{
    header('Location:./index.html?status=error');

  }
}
?>