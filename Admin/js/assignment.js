$(function(){
	$('table').DataTable({
		'scorllX':true
	});
		$("body").on('change',function(arg){
	
		 var element=arg.target;
		 var id=arg.target.id;
		 if (id=='group') {
		 		 $("#year option:first").prop('selected','selected');
		 }
		 if (id=='year') {
		 var group=$("#group option:selected").val();
		 	var year=arg.target.value;
		 	$.ajax({
		 		url:'./assignment.php',
		method:'post',
		data:{group:group,year:year},
		dataType:'JSON',
		success:function(result){
			if (result.group=="bca") {
			if (result.msg) {
				$("#jdata").attr('class','text-center')
				$("#jdata").html(result.msg)
						 				$("#assignment_title").attr('readonly',true)
			}else{
				$("#jdata").html('<select class="form-control col-lg-11 m-2 " name="subject" id="subject"><option>--select--</option></select>');
				for(var i in result.subjects){
					$("#subject").append('<option >'+result.subjects[i]+'</option>');
					i++;
				}
					 				$("#assignment_title").attr('readonly',false)

		}


		}else if (result.group=='bsc') {
				if (result.msg) {
				$("#jdata").attr('class','text-center')
				$("#jdata").html(result.msg)
			}else{
				$("#jdata").html('<select class="form-control col-lg-11 m-2 " id="combination"></select>');
				for(var i in result.combination){
					$("#combination").append('<option >'+result.combination[i]+'</option>');
					i++;
				}
			}
		}
		}
		 	})
	
		 }
		 if (id=='fgroup') {
		 		 $("#fyear option:first").prop('selected','selected');
		 }
		 else if (id=='fyear') {
		 var group=$("#fgroup option:selected").val();
		 	var year=arg.target.value;
		 	$.ajax({
		 		url:'./assignment.php',
		 		method:'post',
		 		data:{fgroup:group,fyear:year},
		 		dataType:'JSON',
		 		success:function(result){
		 			if (result.group=="bca") {

		 			if (result.msg) {
		 				$("#jqdata").html('<div>'+result.msg+'</div>')
		 				$("#assignment_title").attr('readonly',true)
		 			}else{
		
		 				$("#jqdata").html('<label for="subject">Subjects</label><select name="subjects" class="form-control col-lg-10 m-2" id="subjects"><option>--select--</option></select>')
		 				for(var i in result.subjects){
	 					$("#subjects").append('<option>'+result.subjects[i]+'</option>')
		 				i++;	
		 				}
		 				$("#assignment_title").attr('readonly',false)
		 			}
		 			}else if (result.group=="bsc") {
		 				if (result.msg) {
		 				$("#jqdata").html('<div>'+result.msg+'</div>')
		 			}else{
		 				$("#jqdata").html('<label for="combination">Combination</label><select name="combination" class="form-control col-lg-10 m-2" id="combination"></select>')
		 				for(var i in result.combination){
		 					$("#combination").append('<option>'+result.combination[i]+'</option>')
		 				i++;	
		 				}
		 				$("#assignment_title").attr('readonly',false)

		 			}
		 			}
		 		}
		 	})
		 }
		 if (id=='subject') {
		 	var subject=arg.target.value;
					$.ajax({
						url:'./assignment.php',
						method:'post',
						data:{subject:subject},
						dataType:'JSON',
						success:function(result){
							 		$("#jdata").append('<div class="table-responsive  " id="data"></div>')
							 if (!result.msg) {
								$("#data").html('<table class="table  table-bordered" id="ats"><thead><th>Name</th><th>Subject</th><th>Assignment_title</th><th>Date_Of_Submission</th></thead><tbody></tbody></table>');
								for(var i in result.name){
				
								$("#ats").append('<tr><td>'+result.name[i]+'</td><td>'+result.subject[i]+'</td><td>'+result.assignments[i]+'</td><td>'+result.dos[i]+'</td></tr>')	

							

								$("#ats").append('<tr><td>'+result.name[i]+'</td><td>'+result.subject[i]+'</td><td>'+result.assignments[i]+'</td><td>'+result.dos[i]+'</td></tr>')	
								i++;	
								}
							
								$("#ats").DataTable({
									'scorll':true
								})
							 }else{
							 	$("#data").html(result.msg)
							 }
						}
					})
				}
		 
	})
})