<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1"> 

<div class="container">

<?php
session_start();
error_reporting(0);
if (isset($_GET['table'])&&isset($_GET['name'])) {
  $table=$_GET['table'];
  $name=$_SESSION["name"];

  $con=mysqli_connect("localhost","root","","users"); 

    $date=date('Y');
    $from=$date;
   
  $query=mysqli_query($con,"SHOW COLUMNS FROM `$table` WHERE `Field` REGEXP '".$from."'");
  $total_days=mysqli_num_rows($query);
  $count=mysqli_num_rows($query);
    $present=0;
   
  while ($row=mysqli_fetch_assoc($query)) {
    $date=$row['Field'];

 $qu=mysqli_query($con,"SELECT * FROM `$table` WHERE `$date`='Present' AND `name`='$name'");
  while ($re=mysqli_fetch_assoc($qu)){
                      $present++; 
  }
 $que=mysqli_query($con,"SELECT * FROM `$table` WHERE `$date`='Absent' AND `name`='$name'");

 while ($res=mysqli_fetch_assoc($que)) {
  




     }
  

  }

?>

<head><script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</script></head>
<div class="" >
<canvas class="" id="myChart" ></canvas>
</div>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var present =<?php echo  $present  ?>;
var Absent =   <?php echo $total_days-$present;  ?>;
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Absent', 'Present'],
        datasets: [{
            label: '# of days',
            data: [Absent, present],
            backgroundColor: [
                'rgba(255, 99, 132)',
                'rgba(75, 192, 192)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
                    xAxes: [{
              gridLines:{
                 display: false
              }
          }],
            yAxes: [{
              gridLines:{
                display:false
              }
            }]
        }
    }
});
</script>
 
<?php } ?>