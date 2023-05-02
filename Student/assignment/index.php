<?php
session_start();
 if(isset($_SESSION['user'])){
    
    header('Location:../assignment/index.html');
  
    }else{
      header('Location:../login');
    }
    
  
  
?>