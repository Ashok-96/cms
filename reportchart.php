
<?php 
$array = array(1,2,5,4,7,2,4);
$data=json_encode($array);
$arra = array(1,2,5,4,7,4,6,9,9);
$dat=json_encode($arra);
 ?>
<head><script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</script></head>
<div class="container">

<canvas id="myChart" width="auto" height="auto"></canvas>
</div>
<script >
        
var ctx = document.getElementById('myChart').getContext('2d');
var present = <?php echo $data; ?> ;
alert(present);
var Absent =   <?php echo $dat; ?> ;
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: Absent,present,
        datasets: [{
            label: '# of days',
            data: Absent,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(75, 192, 192, 0.2)'

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
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>