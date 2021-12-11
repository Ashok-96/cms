<?php
  	include 'db/dbutil.php';

if (isset($_POST['user_name'])) {
  	$user=$_POST['user_name'];
  	$db=new dbutil();
      $user_name=$_POST['user_name'];
    $db=new dbutil();
    $sql="SELECT `subjects` FROM `admin` WHERE `username`='$user_name' ";
    $res=$db->queryRequest($sql);
    if ($res->num_rows>0) {
      $i=0;
        while ($row=$res->fetch_assoc()) {
          $sub=$row['subjects'];
          $nav=explode(',', $sub);
          foreach ($nav as $key) {
          $array['nav'][]=$key;
          $sub=explode('/', $key);
           $array['classes'][]=$sub[2];
          }
          
          }
      echo json_encode($array);
      }else{
      $array['msg']='type of user not found'; 
    echo json_encode($array);

      }   
  } 
   ?>