$(function(){
	$("#subject").change(function(){

	 var subject=$("#subject option:Selected").val();
	 $("#topic").html("<option></option>");
	 $("#topic").html("<option>"+subject+"</option>");
	 	$.post("Admin/topics.php",{sub:subject},function(data,status){
	 		
	 	})
	});
})