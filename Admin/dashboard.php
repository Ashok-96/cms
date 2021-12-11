<?php
if (isset($_POST["class"])) {
  include 'db/dbutil.php';
  $db=new dbutil();
  $sql="SHOW TABLES FROM `users` WHERE `Tables_in_users` REGEXP '/'";
  $result=$db->queryRequest($sql);
  $array["c_count"][]=$result->num_rows;
  while ($row=$result->fetch_assoc()) {
    $class=explode('/', $row['Tables_in_users']);
    $array['group'][]='<h5>'.$class[0].'</h5>';
    $array['year'][]='<h5>'.$class[1].'</h5>';
  	$array['combination'][]='<h5>'.$class[2].'</h5>';
  }
  echo json_encode($array);
  }
  elseif (isset($_POST["user"])) {
  include 'db/dbutil.php';
  $db=new dbutil();
  $sql="SELECT * FROM `users` WHERE `type`='1'";
  $result=$db->queryRequest($sql);
  $array["u_count"][]=$result->num_rows;
  while ($row=$result->fetch_assoc()) {
  	$array['name'][]=$row['name'];
  	$array['combination'][]=$row['combination'];
  	$array['regno'][]=$row['reg_no'];
  	$array['phone'][]=$row['phonenumber'];
  	$array['year'][]=$row['year'];


  }
  echo json_encode($array);
  }  
   elseif (isset($_POST["tkts"])) {
  include 'db/dbutil.php';
  $db=new dbutil();
  $sql="SELECT * FROM `complaints`";
  $result=$db->queryRequest($sql);
  $array["t_count"][]=$result->num_rows;
  while ($row=$result->fetch_assoc()) {
  	$array['userid'][]=$row['userid'];
  	$array['tkt_id'][]=$row['tkt_id'];
  	$array['stage'][]=$row['stage'];



  }
  echo json_encode($array);
  } 
     elseif (isset($_POST["notify"])) {
  include 'db/dbutil.php';
  $db=new dbutil();
  $sql="SELECT DISTINCT `category`, `combination`,`year` FROM `notification`";
  $result=$db->queryRequest($sql);
  $array["n_count"][]=$result->num_rows;
  while ($row=$result->fetch_assoc()) {
  	$array['category'][]=$row['category'];
  	$array['year'][]=$row['year'];
  	$array['combination'][]=$row['combination'];



  }
  echo json_encode($array);
  }

   elseif (isset($_POST["assignment"])) {
  include 'db/dbutil.php';

  $db=new dbutil();
  $sql="SELECT * FROM `assignment` INNER JOIN `submission` ON submission.assignment_title=assignment.assignment_title JOIN `users` ON submission.submitted_by=users.id";
  $result=$db->queryRequest($sql);
  if ($result->num_rows>0) {
  $array["a_count"][]=$result->num_rows;
  while ($row=$result->fetch_assoc()) {
    $array['subject'][]=$row['subject'];
    $array['topic'][]=$row['assignment_title'];
    $array['dos'][]=date('d-m-yy',strtotime($row['date_of_submission']));
    $array['doc'][]=date('d-m-yy',strtotime($row['submitted_date']));
    $array['name'][]=$row['name'];
    $array['combination'][]=$row['combination'];
    $array['year'][]=$row['year'];
    echo json_encode($array);
  }
  } else{
    $array['msg']="Assignments aren't assigned to students";
    echo json_encode($array);
  }
}
 elseif (isset($_POST['teacher'])) {
     include 'db/dbutil.php';
$i=2;
  $db=new dbutil();
  $sql="SELECT DISTINCT `name`,`id` FROM `admin` WHERE `type`='Teacher'";
     $result=$db->queryRequest($sql);
  if ($result->num_rows>0) {
    while ($row=$result->fetch_assoc()) {
    $array['id'][]=$row['id'];  
    $array['name'][]=$row['name'];
    $array['mid'][]=md5($row['id']);  

 }
echo json_encode($array);
}else{
    $array['msg']="Teachers are not added";
echo json_encode($array);
  } 
  /*$sql='SELECT * FROM `admin` WHERE `type`="Teacher" AND `id`=';
     $result=$db->queryRequest($sql);
  if ($result->num_rows>0) {
    while ($row=$result->fetch_assoc()) {
      $array['name'][]=$row['name'];
      $var=explode(',', $row['subjects']);
      $count=count($var);
      if ($count>1) { 
         echo $count;
         foreach ($var as $key => $value) {
          $array['dealings'][]=$value;
       $array['cout'][]=$count;
         }
      }else{
        $array['dealings'][]=$var[0];
       $array['cout'][]=$count;

      }

  }
  foreach ($array['dealings'] as $value) {
      $var=explode('/', $value);
      $array['comb'][]=$var[0];
       $array['year'][]=$var[1];
       $array['subjects'][]=$var[2];
    }
echo json_encode($array);

}else{
    $array['msg']="Teachers are not added";
echo json_encode($array);
    */

 
  } 
  ?>