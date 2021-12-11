<?php
if (isset($_POST["submit"])) {
  	 $rem=$_POST["remark"];
  	 $tid=htmlspecialchars($_POST["tktid"]);
  	 $st=htmlspecialchars($_POST["stage"]);
  	 if ($st=="Close") {
  	 	$sta=htmlspecialchars($_POST["stage"])."d";
  	      $con=mysqli_connect("localhost","root","","users");
      $query=mysqli_query($con," UPDATE `complaints` SET `remarks`='$rem' ,`stage`='$sta',`status`='Resolved' WHERE `tkt_id`='$tid'");
  if ($query) {
  	echo $tid."is".$sta;
  }
  	 }else{
  	 	$sta=htmlspecialchars($_POST["stage"]);
  	      $con=mysqli_connect("localhost","root","","users");
      $query=mysqli_query($con," UPDATE `complaints` SET `remarks`='$rem' ,`stage`='$sta' WHERE `tkt_id`='$tid'");
  	 if ($query) {
  	echo $tid."is".$st;
  }
  	 }

  }  ?>