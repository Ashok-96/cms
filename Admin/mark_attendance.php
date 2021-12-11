<?php

include 'db/dbutil.php';
class Attendance extends dbutil 
{
function cstatus($start,$per_page)
  {
    $i=$start+1;
    $sum=$start+$per_page;
    while ($i<=$sum) {
      if (isset($_POST['status'.$i.''])) {
      $st=$_POST['status'.$i.''];
      $arr[$i]=$st;
      }else{
        $arr[$i]='Absent';
      }
      $i++;
    }
   return $arr;
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
function listUsers($sql,$date,$day){
      $re=parent::queryRequest($sql);           
          while ($row=$re->fetch_assoc()) {
            echo "<tr>";
          echo "<td>".$row["id"]."</td>";
          echo "<td>".$row["name"]."</td>";
          if (isset($row[$date])) {
            if ($row[$date]=='Present') {
                        echo '<td>   <label class="switch">
        <input type="checkbox" class="custon-control-input" name="status'.$row["id"].'"  id="customSwitch1" value="Present" checked>
        <span class="slider round"></span>
        </label>
        <b class="text-success">Present</b> </td>';
         }else{
              echo '<td>   <label class="switch">
        <input type="checkbox" class="custon-control-input" name="status'.$row["id"].'"  id="customSwitch1" value="Present">
        <span class="slider round"></span>
        </label>         <b class="text-danger">Absent</b>  </td>';
            }
          }else{
                          echo '<td>   <label class="switch">
        <input type="checkbox" class="custon-control-input" name="status'.$row["id"].'"  id="customSwitch1" value="Present">
        <span class="slider round"></span>
        </label>         <b class="text-danger">Absent</b>  </td>';
          }
          }
          echo'
        </tr>  
      </tbody>
    <tr>';
  $day=strtotime($_GET['date']);
  $c=date('l',$day);
  $val=new Attendance();
    if ($c=='Sunday'||strtotime($_GET['date'])>strtotime('now')) {
        $date=$_GET['date'];
  }else{
  $value=$this->checkDate($date);
  if ($value==0) {
    # code...
    echo '<td colspan="3">
        <input class="btn btn-success shadow rounded-pill" type="submit" name="submit" value="Mark page '.$_GET['PGN'].' attendance"></td>';
      }
  }
    echo '</td>
    </tr>  
    </table>
    </form>
    ';

  }
}
?>