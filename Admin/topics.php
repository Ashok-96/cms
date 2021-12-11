<?php 
if (isset($_POST['subject'])) {
	$subject=$_POST['subject'];
	require 'db/dbutil.php';
	$db=new dbutil();
	$sql="SELECT DISTINCT `assingnmet_title` FROM `assignment` WHERE `subject`='$subject';";
	$res=$db->queryRequest($sql);
	if ($res->num_rows>0) {
		# code...
	while ($row=$res->fetch_assoc()) {
		$tarray["topics"][]=$row["assingnmet_title"];

	}
	echo json_encode($tarray);
	}else{
      echo  json_encode("topics not assiged");
	}
}
if (isset($_POST['topic'])) {
	$at=$_POST['topic'];
 	require 'db/dbutil.php';
	$db=new dbutil();
	$sql="SELECT * FROM `submission` WHERE `assingnmet_title`='$at'";
	$res=$db->queryRequest($sql);
	if($res->num_rows>0){
	while ($row=$res->fetch_assoc()) {
	  $ast["ats"][]=$row["assingnmet_title"];
	  $ast["dof"][]=$row["date_of_submission"];
	  $ast["id"][]=$row["id"];
	  $ast["sby"][]=$row["submited_by"];

	}
echo json_encode($ast);
	}

 } 
  ?>