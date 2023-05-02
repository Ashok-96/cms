  <?php
  $res=[];
  session_start(); 
  if(isset($_SESSION['admin'])){
    header('Location:./index.html');
  }else{
    header('Location:../index.php');

  }
  



 