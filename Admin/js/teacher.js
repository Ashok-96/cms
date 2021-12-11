$(function(){
	var i=0;
	$("#aclass").click(function(){
	i++;		
		$("form").append('<div class="form-group " id="class'+i+'"></div>')
		$("#class"+i+"").html('<input class="form-control-plaintext " type="text" name="class[]" pattern="[A-Z]{3,5}[\/0-9\/]{3}[A-Za-z]{4,}"placeholder="classes_allocation">');

	})
$("#rclass").click(function(){
$("#class"+i+"").remove();	
i--;
})	
})