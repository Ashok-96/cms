$(function(){


	$("#subject").change(function(){
	 var subject=$("#subject option:Selected").val();
	 	$("#topic").html("<option>---select---</option>");
	 	if (subject=="---Options---") {
	$("#alert").html('<div class="alert alert-info  fade show" role="alert"><strong>Please select the proper option..!</strong> You should select the subject listed above!...<button type="button" class="close" > </button></div>');		

	 	}else{

	 $.ajax({
	 	url:"./topics.php",
	 	method:"post",
	    dataType:"JSON",
	 	data:{subject:subject},
	 	success:function(result,status){

	$("#alert").html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Please select the topic..!</strong> You should select the topic listed above!...<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');		
	 
	 	
	 	var len=result.topics.length;
	 	for (var i =0 in result.topics) {
	 		$("#topic").append("<option>"+result.topics[i]+"</option>");
       i++;
	 	}
	 	},
	 error:function(xhr){
	 		$("#topic").html("<option>Sorry</option>");

	 	}
	 });
	 
	 	}
	});
	$("#topic").on('append change',function(){
		var topic=$("#topic option:Selected").val();

		if (topic=="---select---") {

	$("#alert").html('<div class="alert alert-danger  fade show" role="alert"><strong>Please select the topic..!</strong> You should select the topic listed above!...<button type="button" class="close" > </button></div>');		
    
}else{
$("#tbody").html('<table id="myTable" class="table  no-wrap table-bordered table-responsive  table-striped "><thead ><th>Submited_by</th><th>Date_of_submission</th>	<th>Assignment name</th><th>Assignment name</th></thead><tbody id="datas"></tbody></table>');
$.ajax({
	url:"./topics.php",
	method:"post",
	dataType:"JSON",
	async:true,
	data:{topic:topic},
	success:function(result,status){
  for (var i in result.id) {
  $("#myTable").append("<tr><td>"+result.id[i]+"</b></td><td ><b>"+result.ats[i]+"</b></td><td><b>"+result.dof[i]+"</b></td><td><b>"+result.sby[i]+"</b></td></tr>");
  i++;}
$("#myTable").DataTable({
	keys: true,
	"scorllX":true
});


			
	},
	 error:function(xhr){
	 		
	$("#tbody").html('<div class="alert alert-danger  fade show" role="alert"><strong>No Submission..!</strong>as of now none of them submited<button type="button" class="close" > </button></div>');		

	 	}

});	

 }

	});
})