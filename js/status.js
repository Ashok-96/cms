$(function(){
 $("#class").change(function(){
var table=$("#class option:selected").val();
var user=$("#class").attr('user');
  
 $.ajax({
  url:'dates.php',
  method:'post',
  data:{table:table,user:user},
  dataType:"JSON",
success:function (data,status) {
    if (data.statuses) {

$("#data").html('<table id="datatable" class="table display table-bordered col-5"  ><thead ><th>Dates</th><th>Status</th></thead><tbody id="myTable" ></tbody></table>')
for (let i =data.dates.length - 1; i > 0; i--) {
    $("#myTable").append(`<tr>
        <td> ${data.dates[i]} </td><td> ${data.statuses[i]} </td></tr>`);

}   
$('#datatable').DataTable()
    }else{
        $("#data").html('<div class="alert alert-warning alert-dismissible fade show" role="alert"> No records found! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')
    }
}    
})
 })
 })