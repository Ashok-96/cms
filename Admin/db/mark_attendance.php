<?php
class demo
{
  function cstatus($start,$per_page)
  {
    $i=$start;
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
  function akay($arr){
 foreach ($arr as $key => $value) {
   echo $key."by".$value;
 }
  }
}
?>