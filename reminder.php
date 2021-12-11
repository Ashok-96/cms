
<?php
$cur=date('yy-m-d');
$cdate=strtotime($cur);
$con=mysqli_connect("localhost","root","","users");
$sql=mysqli_query($con,"SELECT * FROM `assignment`");

	while ($res=mysqli_fetch_assoc($sql)) {
		$id=$res["id"];
		$date=$res["date_of_submission"]."<br>";
$sdate=strtotime($res["date_of_submission"]);
$count=$sdate-$cdate;
    $diff=$count/(60*60*24)."<br>";
 if ($diff>1&&$diff<=7) {
 	echo "<div class='alert col-lg-4 	alert-primary alert-dismissable fade show' role='alert' style='position:relative ; float: right; top: -20px; right:0;'>";
     echo "<button type='button' class='close' data-dismiss='alert' aria-label='close'>";
     echo "</button>";
 	 	echo "<h2 class='alert-heading '>Assignment no:".$id."</h2><div class='alert-body'>".$diff."days left for assignment submission...<br></div>";
 	echo "<div class='alert-footer'>Make sure to submit ontime</div></div>";
 }elseif ($diff==1) {
 	echo "<div class='card-header'>Assignment no:".$id."</div><div class='card-body'> ".$diff."day left for assignment submission...<br></div>";
  	echo "Make sure to submit ontime </div><br>";	
 }elseif ($diff==0) {

 	echo "".$diff."last day  for submission of assignment...<br>";

 }


	}


?>
