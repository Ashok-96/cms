<?php
error_reporting(0); 
if (isset($_POST["submit"])) {
  $con=mysqli_connect("localhost","root","","users");
    $year=$_POST["year"];
    $combination=$_POST["select"];
    $cat=$_POST["category"];
    $scat=$_POST["subcategory"];
    $msg=$_POST["message"];
  if (($combination=="All")&&($year=="All")) {
      $quer1=mysqli_query($con,"SELECT `id` FROM `users` WHERE `type`=1");
      
      while ($row=mysqli_fetch_assoc($quer1)) {
        $id[]=$row["id"];
      }
      foreach ($id as $key ) {
        $send=mysqli_query($con,"INSERT INTO `notification`( `SID`, `combination`, `year`, `category`, `sub_category`, `message`) VALUES('".$key."','".$combination."','".$year."','".$cat."','".$scat."','".$msg."')");
      }
      if ($send) {
    echo "Notified successfully";
        # code...
      }else{
    echo "oops!! Something went wrong please try after sometime";

      }	
            
  }elseif (($combination=="All")&&($year>0)) {
      $quer1=mysqli_query($con,"SELECT `id` FROM `users` WHERE `type`=1 AND `year`='$year'");
    
      while ($row=mysqli_fetch_assoc($quer1)) {
        $id[]=$row["id"];
      }
      foreach ($id as $key ) {
        $query2=mysqli_query($con,'INSERT INTO `notification`( `SID`, `combination`, `year`, `category`, `sub_category`, `message`) VALUES("'.$key.'","'.$combination.'","'.$year.'","'.$cat.'","'.$scat.'","'.$msg.'")');
      }
      if ($query2) {
    echo "Notified successfully";
    
      }else{
    echo "oops!! Something went wrong please try after sometime".$combination;
    

      }
    }elseif(($combination!=="All")&&($year>0)) {
      $quer1=mysqli_query($con,"SELECT `id` FROM `users` WHERE `year`='$year' AND `combination`='$combination'");
    
      while ($row=mysqli_fetch_assoc($quer1)) {
        $id[]=$row["id"];
      }
      foreach ($id as $key ) {
        $query3=mysqli_query($con,'INSERT INTO `notification`( `SID`, `combination`, `year`, `category`, `sub_category`, `message`) VALUES("'.$key.'","'.$combination.'","'.$year.'","'.$cat.'","'.$scat.'","'.$msg.'")');
      }
      if ($query3) {
    echo "Notified successfully";
        # code...
      }else{
    echo "oops!! Something went wrong please try after sometime".$combination.$year;
      }
    }
 
  }  ?>   