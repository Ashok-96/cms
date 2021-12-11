  
  $(function(){
    $("#select ").change(function(){
      var table =$("#select option:selected").val();
$("#page").attr('src','chart.php?table='+table+'&&name='+name+'');
    $.post("dates.php",{class:table},function(data,status){
      var dates=JSON.parse(data);
      var len=dates.status.length;
 
  $("#data").html('<table class="table table-sm table-striped table-bordered"  ><thead class="bg-dark text-white"><th>Class</th><th >Dates <input class="form-control"  type="text" id="uip" placeholder="&#xF002 dd/M/yy Search" style="font-family: fontawesome;"></th><th>Status</th></thead><tbody id="myTable" ></tbody></table>');    
      var i=0;
           for (var i in dates.status) {
  $("#myTable").append("<tr><td  class=''><b>"+table+"</b></td><td  class=''><b>"+dates.id[i]+"</b></td><td><b>"+dates.status[i]+"</b></td></tr></b>");
  i++;
     }
            $("#uip").on("keyup", function() {
var value = $(this).val().toLowerCase();
    
if (value) {

    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
$("tr td").attr("class","text-success");
$("#uip").css("background","lightyellow");

    });
} else {
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
$("tr td").attr("class","text-dark");
$("#uip").css("background","white");
    });
}
    

     
    
  });

     
   

  
      
});

   
    });


   


  });
