<?php
$op=[];
include('../../Common files/db/dbutil.php');
$db=new DButil();
if (isset($_POST['Teachers'])) {
  $sql="SELECT * FROM `registration` ORDER BY `Firstname` ASC";
  $res=$db->queryRequest($sql);
while($row=$res->fetch_assoc()){
    $op['id'][]=$row['id'];
    $op['reg_date'][]=$row['registration_date'];
    $op['Firstname'][]=$row['Firstname'];
    $op['Lastname'][]=$row['Lastname'];
    $op['Gender'][]=$row['Gender'];
    $op['phone'][]=$row['phone'];
    $op['semester'][]=$row['semester'];
    
    $op['combination'][]=$row['combination'];


}
echo json_encode($op);
}
if(isset($_POST['Combin_list'])){
  $sql="SELECT * FROM `combinations`";
  $res=$db->queryRequest($sql);
  while($row=$res->fetch_assoc()){
    $op['Combin_list'][]=$row['combination'];
  }
 
  echo json_encode($op);

}
if(isset($_POST['save'])){
  $sql="INSERT INTO `registration`( `registration_date`,`Firstname`,`Lastname`,`Gender`, `combination`, `username`, `phone`,`password`, `semester`) VALUES ('".$_POST['Date']."','".$_POST['Firstname']."','".$_POST['Lastname']."','".$_POST['Gender']."', '".$_POST['combination']."','".$_POST['username']."','".$_POST['phone']."','".$_POST['password']."','".$_POST['Semester']."')";
  $res=$db->queryRequest($sql);
  if($res){
    header('Location:./index.html?status=success');
  }else{
    header('Location:./index.html?status=error');

  }
}
?>