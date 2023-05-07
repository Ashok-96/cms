<?php



include '../../../Common files/db/dbutil.php';
$data=[];
$db = new DButil();
if(isset($_POST['display'])){
$sql="SELECT`id`, `Firstname`,`Lastname`, `combination` FROM `registration` WHERE `id`='".$_POST['id']."';";
$combination="SELECT DISTINCT(`combination`) from `combinations`";
$res_2=$db->queryRequest($combination);
while($row=$res_2->fetch_assoc()){
  $data['combination'][]=$row['combination'];
}
$res=$db->queryRequest($sql);

while($row=$res->fetch_assoc()){
  $data['result']=$row;
}
echo json_encode($data);
}
if(isset($_POST['submit'])){
  print_r($_POST);
  $sql = "UPDATE `teachers` SET `Firstname`='" . $_POST['Firstname'] . "', `Lastname`='" . $_POST['Lastname'] . "', `Department`='" . $_POST['Departments'] . "' WHERE `id`='".$_POST['submit']."'";

  $result = $db->queryRequest($sql);

  if ($result) {
    header('location:../index.html?status=success');
  print_r($_POST);

  }else{
    header('location:../index.html?status=failure');

  }
}
  

/*if(isset($_POST['update'])){

    $sql = "UPDATE `registration` SET `Firstname`='" . $_POST['fname'] . "', `Lastname`='" . $_POST['lname'] . "', `combination`='" . $_POST['combination'] . "' WHERE `id`='".$_POST['id']."'";

    $result = $db->queryRequest($sql);

    if ($result) {

?>



  <?php

        header('location:../?status=success');

    }else{

        ?>

        

   <div class="alert alert-danger alert-dismissible fade show" role="alert">

  <strong>Something went wrong!</strong> Please try after sometime.

  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>

   <?php }

}*/

?>