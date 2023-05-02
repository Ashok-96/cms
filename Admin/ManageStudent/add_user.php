<?php
print_r($_POST);
if(isset($_POST['submit'])){
   
    include '../../Common files/db/dbutil.php';
$db= new DButil();   
print_r($_POST);
$sql='INSERT INTO `registration` (`Firstname`,`Lastname`,`Gender`,`Combination`, `username`, `Phone`, `password`) VALUES("'.$_POST['Firstname'].'","'.$_POST['Lastname'].'","'.$_POST['gender'].'","'.$_POST['combination'].'","'.$_POST['username'].'","'.$_POST['phone'].'","'.md5($_POST['password']).'")';
$result=$db->queryRequest($sql);
if($result){
  echo "Registed successfully";
  header('Location: ./index.html?status=success');


    }else{
    header('Location: ./index.html?status=error');
    echo "Something wemt wrong!!";

}
  }



?>