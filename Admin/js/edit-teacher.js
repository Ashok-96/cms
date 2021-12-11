$(function(){
	var i=$("#aclass").attr('count');
	$("#aclass").click(function(){
		
	i++;		
		$("#combination").append('<div id="combination'+i+'" class="form-group p-2" ><input class="form-control p-2 " type="text" name="combination[]" placeholder="combination"></div>');
		$("#year").append('<div id="year'+i+'" class="form-group p-2" ><input class="form-control p-2 " type="text" name="year[]" placeholder="year"></div>');
		$("#subjects").append('<div id="subjects'+i+'" class="form-group p-2" ><input class="form-control p-2 " type="text" name="subjects[]" placeholder="subjects"></div>');
		

	})
$("#rclass").click(function(){
$("#subjects"+i+"").remove();	
$("#combination"+i+"").remove();
$("#year"+i+"").remove();	
i--;


})	
})