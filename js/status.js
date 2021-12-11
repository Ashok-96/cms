$(function(){


 $("#class").change(function(){
var table=$("#class option:selected").val();
var user=$("#class").attr('user');
 $.ajax({
  url:'dates.php',
  method:'post',
  data:{table:table,user:user},
  dataType:"JSON",
  success:function(result){
        var present=0;
   var ctx = document.getElementById('myChart').getContext('2d');
    var total=result.dates;
$("#data").html('<table id="stats" class="table display table-striped table-bordered"  ><thead ><th>Dates</th><th>Status</th></thead><tbody id="myTable" ></tbody></table>'); 
 for (var i in result.dates) {
 if (result.statuses[i]=="Present") {
present+1;
 $("#myTable").append("<tr><td class=''><b>"+result.dates[i]+"</b></td><td  class='text-success'><b>"+result.statuses[i]+"</b></td></tr>");
 present++;
 }else{
 $("#myTable").append("<tr><td class=''><b>"+result.dates[i]+"</b></td><td  class='text-danger'><b>"+result.statuses[i]+"</b></td></tr>");
}

  i++;
     }

var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: total,
        datasets: [{
            label: '# of Votes',
            data: [present],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
   scales: {
        xAxes: [{
            gridLines: {
                display:false
            }
        }],
        yAxes: [{
            gridLines: {
                display:false
            }   
        }]
    }
    }
});

     $("#stats").DataTable(); 

  }
   })




 })
})