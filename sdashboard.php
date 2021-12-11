<?php 
if (isset($_POST['assignment'])) {
  session_start();
	$combination=$_POST['combination'];
	$year=$_POST['year'];
	$cs=''.$combination.'/'.$year.'';
 	include 'db/dbutil.php';
 	$db=new dbutil();
 $uid=$_SESSION['userID'];
 	$query="SELECT * FROM `assignment` WHERE `combination`='$combination' AND `year`=$year";
    $result=$db->queryRequest($query);
    if ($result->num_rows>0) {
   
    while ($row=$result->fetch_assoc()) {
      $at=$row['assignment_title'];
       $query1="SELECT * FROM `submission` JOIN `admin` ON submission.submited_by=admin.id WHERE admin.id='$uid' AND `assignment_title`='$at'";
    $result1=$db->queryRequest($query1);
    if ($result1->num_rows>0) {
      $data['status']='submited';

    }else{
      $data['status']='not_sumbited';

    }

    	$data['subject'][]=$row['subject'];
    	$data['title'][]=$row['assignment_title'];
    	$data['doc'][]=$row['date_of_creation'];
    	$data['dof'][]=$row['date_of_submission'];
    }
    echo json_encode($data);

    }else{
    	$data['msg']='No assignments';
    echo json_encode($data);
    }
 	
 } 
if (isset($_POST['classes'])) {
	$combination=$_POST['combination'];
	$year=$_POST['year'];
	$cs=''.$combination.'/'.$year.'';
 	include 'db/dbutil.php';
 	$db=new dbutil();
 	$sql="SHOW TABLES WHERE `Tables_in_users` REGEXP '^$cs'";
 	$res=$db->queryRequest($sql);
 	while ($r=$res->fetch_assoc()) {
          $subjects=explode('/', $r['Tables_in_users']);
          $subject['class2'][]=$subjects[2];
    }
 echo json_encode($subject);
}
if (isset($_POST['user'])) {
$user=$_POST['user'];
 	include 'db/dbutil.php';
 	$db=new dbutil();
	 $query="SELECT * FROM `complaints` WHERE `userid`='$user'";
 	$res=$db->queryRequest($query);
 while ($row=$res->fetch_assoc()) {
 	
  $array['tickets'][]=$row['tkt_id'];
  $array['stage'][]=$row['stage'];
 }
 echo json_encode($array);
}
?>