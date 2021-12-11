$(function(){
		$("body").on('change',function(arg){
		 var element=arg.target;
		 var id=arg.target.id;
		 if (id=='fyear') {
		 var group=$("#fgroup option:selected").val();
		 	var year=arg.target.value;
		 	
		 }
		 
	})
})