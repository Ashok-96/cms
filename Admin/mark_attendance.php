<?php

include 'db/dbutil.php';
class Attendance extends dbutil 
{
  function AddData(){
   $date=date('d-M-Y');
   $class=$_SESSION['class'];
   $sql='SHOW COLUMNS FROM `'.$class.'` LIKE "%'.$date.'"';
    $res=parent::queryRequest($sql);
    $count=$res->num_rows;
  if ($count===0){
    $sql='ALTER TABLE `'.$class.'` ADD COLUMN `'.$date.'` VARCHAR(10) DEFAULT "Absent" NOT NULL';
   $re=parent::queryRequest($sql);
if ($re) {
    echo 'Everything is set to mark';
  }else{
    exit(0);
  }
  }
  }
function query($sql){
    return parent::queryRequest($sql);
}
function checkDate($date){
  $cdate=strtotime(date('d-M-yy'));
  $cval=strtotime($date);
  $diff=ceil((($cval-$cdate)/(60*60*24)));
  return $diff;

}
function listUsers($sql,$date){
      $re=parent::queryRequest($sql);
      
          while ($row=$re->fetch_assoc()) {
            echo "<tr>";
          echo "<td class=col-4>".$row["name"]."</td>";
          if (isset($row[$date])) {
            if ($row[$date]=='Present') {
                        echo '<td class=col-4 >   <label class="switch">
        <input type="checkbox" class="custon-control-input" name="status'.$row["id"].'" onclick="demo('.$row["id"].')" id="status'.$row["id"].'" value="Present" checked>
        <span class="slider round"></span>
        </label>
       <b class="text-success" id="remark'.$row["id"].'">Present</b>  </td>';
         }else{
              echo '<td class=col-4>   <label class="switch">
        <input type="checkbox" class="custon-control-input" name="status'.$row["id"].'"  onclick="demo('.$row["id"].')" id="status'.$row["id"].'" value="Present">
        <span class="slider round"></span>
        </label>       <b class="text-danger" id="remark'.$row["id"].'">Absent</b>  </td>';
            }
          }
          else{
            ?>
        <td class=col-4>   <label class="switch" id="switch">
        <input type="checkbox" class="custon-control-input" name="status<?php echo $row["id"] ?>" id="status<?php echo $row["id"] ?>"  onclick="demo(<?php echo $row["id"] ?>)" value="Present">
        <span class="slider round"></span>
        </label>         
        <b class="text-danger" id="remark<?php echo $row["id"] ?>">Absent</b>  </td>
         <?php }
          }
          ?> 
          
        </tr>  
      </tbody>
    <tr>
  <?php 
  

  }
}
?>