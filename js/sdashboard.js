$(function(){
	$("#assignments").click(function(){
		var assignments=$("#assignments").attr('id');
		var combination=$("#assignments").attr('combination');
		var year=$("#assignments").attr('year');
		$.ajax({
			url:'./sdashboard.php',
			method:'post',
			data:{assignment:assignments,combination:combination,year:year},
			dataType:'JSON',
			success:function(result){
				if (result.msg) {	
				$(".datas").html('<div class="alert alert-info alert-dismissable" role="alert" id="msg"><button class="close pl-2" data-dismiss="alert">&times;</button></div>');
               	$("#msg").append("<strong>"+result.msg+"...!</strong>");
				}else{		
               	$(".datas").html('<table id="ats" class="table table-bordered "><thead><th>Subject</th><th>Status</th><th>Assignment_Title</th><th>Date_Of_Submission</th></thead><tbody></tbody></table>');
				for(var i in result.subject){
					if (result.status=='submited') {
					$('tbody').append('<tr><td class="text-success"><strong>'+result.status+'</strong></td><td>'+result.subject[i]+'</td><td>'+result.title[i]+'</td><td>'+result.dof[i]+'</td></tr>')
				}else{
					$('tbody').append('<tr><td class="text-danger"><strong>'+result.status+'</strong></td><td>'+result.subject[i]+'</td><td>'+result.title[i]+'</td><td>'+result.dof[i]+'</td></tr>')

				}
					i++;
				}
		$('#ats').DataTable({
			'scrollX':true
		});
				}

			},error:function(xhr){
				alert(xhr)
			}
		})
	})
	$("#subject").click(function(){
	var subjects=$("#subject").attr('id');
		var assignments=$("#subject").attr('id');
		var combination=$("#subject").attr('combination');
		var year=$("#assignments").attr('year');
	$.ajax({
			url:'./sdashboard.php',
			method:'post',
			data:{classes:subjects,combination:combination,year:year},
			dataType:'JSON',
			success:function(result){
				$(".datas").html('<dt></dt>');
				$('dt').prepend('<dd>Subjects</dd>');
					for(var i in result.class2){
					$('dt').append('<dd>'+ result.class2[i]+'</dd>');
					i++;
					}

			}
	})
	})	
	$("#tickets").click(function(){
		var user=$("#tickets").attr('user');
		$.ajax({
			url:'./sdashboard.php',
			method:'post',
			data:{user:user},
			dataType:'JSON',
			success:function(result){
				$(".datas").html('<table class="table table-bordered"><thead><th>Ticket_id</th><th>Stage</th></thead><tbody></tbody></table>');
						for(var i in result.tickets){
					$('tbody').append("<tr><td><a href='./read_details.php?id="+result.tickets[i]+"' target='_blank'>"+result.tickets[i]+"</a></td><td>"+result.stage[i]+"</td></tr>");
					i++;
				}
					$('.table').DataTable({
						'scrollX': true
					});
			  
			}
		})
	})
})