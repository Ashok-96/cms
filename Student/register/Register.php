  <?php 
require_once('../../Common files/db/dbutil.php');
  $db = new DButil();

  $sql = 'select `Status`  from `configurations` WHERE `Entities`="Registration"';
  $result = $db->queryRequest($sql);
  while($row=$result->fetch_assoc()){
    $status=$row['Status'];
  }

    if($status==1){
    

$input = [];
if (isset($_POST["submit"])) {
  foreach($_POST as $key=>$val){
    if($key=='password'){
      $input[$key]=md5($val);
    }else{
      $value=htmlspecialchars($val);
      $input[$key] = $value;
    }
  }

  print_r($input);

$sql='INSERT INTO `registration` (`Firstname`,`Lastname`,`Gender`,`Combination`, `username`, `Phone`, `password`) VALUES("'.$input['Firstname'].'","'.$input['Lastname'].'","Male","'.$input['Combination'].'","'.$input['username'].'","N/A","'.$input['password'].'")';
$result=$db->queryRequest($sql);
if($result){
  echo "Registed successfully";
  header('Location: ../?status=Registed successfully');
}else{
  header('Location: ./index.html');
  echo "Something wemt wrong!!";

}
  }
}
?>
<?php
    
?>