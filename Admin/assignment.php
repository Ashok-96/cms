<?php
if (isset($_POST['group'])) {
  	$group=$_POST['group'];
  	$array['group']=$group;
  	if ($group=='bca') {

  	$year=$_POST['year'];
 $qvar=$group.'/'.$year;
  		require 'db/dbutil.php';	
  		$db=new dbutil();
  		$sql="SHOW TABLES WHERE `Tables_in_users`REGEXP '$qvar'";
  		$res=$db->queryRequest($sql);
  		if ($res->num_rows>0) {
  			while ($row=$res->fetch_assoc()) {
  				$array['gid'][]=$row['Tables_in_users'];
  				$sub=explode('/', $row['Tables_in_users']);
  				$array['subjects'][]=$sub[2];			
  			}
  			echo json_encode($array);
  		}else{
  			$array['msg']="Sorry the subjects aren't created for <span class='text-uppercase'>".$group."</span>&nbsp;".$year."";
  			echo json_encode($array);

  		}
  	}else if ($group=='bsc') {
  	$year=$_POST['year'];
 		$qvar=$group.'/'.$year;
  		require 'db/dbutil.php';	
  		$db=new dbutil();
  		$sql="SHOW TABLES WHERE `Tables_in_users`REGEXP '$qvar'";
  		$res=$db->queryRequest($sql);
  		if ($res->num_rows>0) {
  			while ($row=$res->fetch_assoc()) {
  				$array['gid'][]=$row['Tables_in_users'];
  				$sub=explode('/', $row['Tables_in_users']);
  				$array['combination'][]=$sub[2];			
  			}
  			echo json_encode($array);
  		}else{
  			$array['msg']="Sorry the combinations aren't created for <span class='text-uppercase'>".$group."</span>&nbsp;".$year."";
  			echo json_encode($array);

  		}
  }
  }
  	if (isset($_POST['subject'])) {
    	$subject=$_POST['subject'];
    	require 'db/dbutil.php';
    	$db=new dbutil();
    	$sql="SELECT * FROM `submission` JOIN `admin` ON  submission.submited_by=admin.id WHERE `subject`='$subject'";
    	$res=$db->queryRequest($sql);
    	if ($res->num_rows>0) {
    		while ($row=$res->fetch_assoc()) {
    			$array['assignments'][]=$row['assignment_title'];
				$array['subject'][]=$row['subject'];
				$array['uid'][]=$row['submited_by'];
				$array['date'][]=$row['date'];
        $array['name'][]=$row['name'];
        $array['dos'][]=$row['date_of_submission'];
    		}
    		echo json_encode($array);
    	}else{
    		$array["msg"]="No assignments fixed/submited for the subject :- ".$subject."";
    		echo json_encode($array);

    	}
    }
    if (isset($_POST['fgroup'])) {
    $group=$_POST['fgroup'];
    $array['group']=$group;
    if ($group=='bca') {
    $year=$_POST['fyear'];
 $qvar=$group.'/'.$year;
      require 'db/dbutil.php';  
      $db=new dbutil();
      $sql="SHOW TABLES WHERE `Tables_in_users`REGEXP '$qvar'";
      $res=$db->queryRequest($sql);
      if ($res->num_rows>0) {
        while ($row=$res->fetch_assoc()) {
          $array['gid'][]=$row['Tables_in_users'];
          $sub=explode('/', $row['Tables_in_users']);
          $array['subjects'][]=$sub[2];     
        }
        echo json_encode($array);
      }else{
        $array['msg']="Sorry the subjects aren't created for <span class='text-uppercase'>".$group."</span>&nbsp;".$year."";
        echo json_encode($array);

      }
    }else if ($group=='bsc') {
    $year=$_POST['fyear'];
    $qvar=$group.'/'.$year;
      require 'db/dbutil.php';  
      $db=new dbutil();
      $sql="SHOW TABLES WHERE `Tables_in_users`REGEXP '$qvar'";
      $res=$db->queryRequest($sql);
      if ($res->num_rows>0) {
        while ($row=$res->fetch_assoc()) {
          $array['gid'][]=$row['Tables_in_users'];
          $sub=explode('/', $row['Tables_in_users']);
          $array['combination'][]=$sub[2];      
        }
        echo json_encode($array);
      }else{
        $array['msg']="Sorry the combinations aren't created for <span class='text-uppercase'>".$group."</span>&nbsp;".$year."";
        echo json_encode($array);

      }
  }

  } 
   ?>