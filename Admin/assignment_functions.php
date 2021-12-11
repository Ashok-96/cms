<?php
  class Assignment extends dbutil
  {


function topics($sql)
{
   $res=parent::queryRequest($sql);
   while ($row=$res->fetch_assoc()) {
   	echo "<option value='".$_SERVER['PHP_SELF']."?assignment_title=".$row['assignment_title']."'>".$row['assignment_title']."</option>";
   }
}
function unsubmitters($usub){
   $res=parent::queryRequest($usub);
   if ($res) {
   if ($res->num_rows==0) {
     echo "soory";
   }else{

    while ($row=$res->fetch_assoc()) {
    	echo "<tr>";
    	echo "<td>";
    	echo $row['assignment_title'];
    	echo "</td>";
    	echo "<td>";
    	echo $row['name'];
    	echo "</td>";
    	echo "<td>";
    	echo $row['reg_no'];
    	echo "</td>";

    }
   }
   }else{
    echo "Assignment aren't fixed/or assignend to students";
   }

}
  
  }  ?>