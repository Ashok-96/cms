<head>
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</script>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 <link rel="stylesheet"
href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
 <?php
 $Present=0;
 session_start();
 if (strlen($_SESSION["from"])!=0&&strlen($_SESSION["to"])!=0) {
 	# code...
error_reporting(0);  
  $conn = mysqli_connect("localhost","root","","users");
  $date1=strtotime($_SESSION["from"]);
    $date2=strtotime($_SESSION["to"]);
$from=date("d-M-yy",$date1);	
$to=date("d-M-yy",$date2);
$var=explode('/', $_SESSION['class']);
$class=$_SESSION['class'];
$i=1;
$avg=0;
 while ($i<=30) {
     $query2=mysqli_query($conn,"SELECT * FROM `$class` JOIN `users` ON `$class`.id=users.id WHERE `$class`.`id`=$i");
     while ($row=mysqli_fetch_assoc($query2)) {
     
       $name[]=$row["name"]; 
       
        

     }

$query=mysqli_query($conn,"SHOW COLUMNS FROM `$class`  WHERE `Field` BETWEEN '$from' AND '$to'");  
while ($res=mysqli_fetch_assoc($query)) {

$date=$res["Field"];
$query1=mysqli_query($conn,"SELECT * FROM `$class` JOIN `users` ON `$class`.id=users.id WHERE  `users`.`id`='$i' AND `$class`.`$date`='Present' ");
while ($result=mysqli_fetch_assoc($query1)) { 

$Present++;

 }

}
$shr=$Present/mysqli_num_rows($query)*100;
  $data[]=floor($shr); 
$count[]=$Present;
$Present=0;
$i++;
 }
  $sum=0;


?>
</div>




  </div>

   <div class="container">
 <div class="row">
  <div class="col-lg-4  col-xs-10">
  <h3>
    <i class="fa fa-university"></i><?php echo $class; ?></h3>
  </div>
</div> 
<div class="row">
  <div class="col-lg-4 col-xs-10">
  <h6><i class="fa fa-calendar"></i> From: <?php echo $from; ?> To: <?php echo $to; ?></h6>
 </div>
 </div> 

  <div class="row">
    <div class="col-lg-4 col-xs-10">
    <h6>Dear students whose percentage is < 75% has to report to department </h6>
  </div>
 </div> 
  <div class="row"><h4>  <?php $query=mysqli_query($conn,"SHOW COLUMNS FROM `$class` WHERE `Field` BETWEEN '$from' AND '$to' "); ?></h4></div>
   <div class="col-md-9">
<canvas class=" col-lg-12 " id="myChart"  ></canvas>
</div>
</div>
<script >
        
var ctx = document.getElementById('myChart').getContext('2d');
var present = <?php echo json_encode($data); ?> ;
var names = <?php echo json_encode($name); ?> ;
var count = <?php echo json_encode($count); ?> ;
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels:names,
        datasets: [{
            label:[count],
            data: present,
              
            backgroundColor:'rgba(75, 192, 50,0.7 )', 
            borderColor:'rgba(75, 192, 50)',
            borderWidth: 1
        }]
    },
    options: {
      tooltips: {
             enabled: false
        },
        scales: {
          xAxes: [{
              gridLines:{
                 display: false
              }
          }],
            yAxes: [{
              gridLines:{
                 display: true
              },

                ticks: {

                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
<div class="container">
<div class="row">

 <table class="table table-bordered text-center table-sm table-striped" >
  <tr class="p-3">
<th  class="p-3"><i class="fa fa-list"></i> Sl.no</th>
 <th><i class="fa fa-user-circle"></i> Name</th>  
 <th>Combination </th>
 <th>year </th> 

 <th>No of classes held</th>
 <th>No of classes Attended</th>

  <th>Precentage</th>
  <?php
  $i=1;
while ($i<=30) {
     $query3=mysqli_query($conn,"SELECT * FROM `$class` JOIN `users` ON `$class`.`id`=users.id WHERE users.`id`=$i");
     while ($row=mysqli_fetch_assoc($query3)) {
       echo "<tr >";  
       echo "<td class='text-center'>";  
       echo $row["id"];  
       echo "</td>";        
       echo "<td class='table-sm'>";  
       echo $row["name"]; 
       $name[]=$row["name"]; 
       echo "</td>"; 
       echo "<td class='text-center'>";  
       echo $row["combination"];  
       echo "</td>"; 
echo "<td class='text-center'>";  
       echo $row["year"];  
       echo "</td>"; 
       echo "<td>";         
       echo mysqli_num_rows($query);  
        

     }
$query=mysqli_query($conn,"SHOW COLUMNS FROM `$class`  WHERE `Field` BETWEEN '$from' AND '$to'");  
while ($res=mysqli_fetch_assoc($query)) {

$date=$res["Field"];
$query1=mysqli_query($conn,"SELECT * FROM  `$class` JOIN `users` ON `$class`.`id`=users.id WHERE `$class`.`id`='$i' AND `$class`.`$date`='Present'");
while ($result=mysqli_fetch_assoc($query1)) { 
$Present++;

 }

}
       echo "<td>";  
      echo $Present; 

      echo "</td>";
$shr=$Present/mysqli_num_rows($query)*100;
  $data=$Present;    
$avg=$avg+floor($shr);
if ($shr<=74) {
echo "<td class='table-danger '><strong>";
echo floor($shr);
echo "%</td></strong>";  # code...
} else{
echo "<td class='table-success '><strong>"; 
echo floor($shr);
echo "%</td></strong>";
echo "</tr>";
}
$Present=0;
$i++;
 }

  echo "</table>";

?>
</div>
</div>

<?php }else{
	echo "<h2>please select the appropriate values</h2>";
}

?>






</body>
</html>