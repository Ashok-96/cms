
$(function(){
  $("#classes").click(function(){
    var data =$(this).attr('id');
    $.ajax({
      url:"./dashboard.php",
      method:"post",
      data:{class:data},
      dataType:"JSON",
      success:function(result){
    $("#datatable").html("<div class='' id='res'></div>");
      $("#res").html("<table id='data' class='table  no-wrap table-bordered table-striped  '><thead><th>Group</th><th>year</th><th>combination</th><th>Classes</th></thead><tbody></tbody></table>");
      for (var i in result.group){
      $("tbody").append('<tr><td>'+result.group[i]+'</td><td class="text-uppercase">'+result.year[i]+'</td><td>'+result.group[0]+'</td><td>'+result.combination[i]+'</td></tr>')
      i++;
     }
      $("tfoot").append('<tr><td>Total:-'+result.c_count+'</td></tr>')
      $("#data").DataTable({
        dom: 'Bfrtip',
        buttons: ['print']
      });
      },
      error:function(xhr){
        alert(xhr)
      }
    });
  });
    $("#user").click(function(){
    var data1 =$(this).attr('id');
        $.ajax({
      url:"./dashboard.php",
      method:"post",
      data:{user:data1},
      dataType:"JSON",
      success:function(result){
         $("#datatable").html("<div class=' ' id='asts'></div>");
      $("#asts").html("<table id='data' class='table  no-wrap table-bordered  table-striped '><thead><th>Name</th><th>Combination</th><th>phone</th><th>Register_number</th><th>year</th></thead><tbody></tbody><tfoot></tfoot></table>");
      for (var i in result.name){
      $("tbody").append('<tr><td>'+result.name[i]+'</td><td>'+result.combination[i]+'</td><td>'+result.phone[i]+'</td><td>'+result.regno[i]+'</td><td>'+result.year[i]+'</td></tr>')
      i++;}
 
      $("#data").DataTable({
        "scrollX": true
      });
      },
      error:function(xhr){
        alert(xhr)
      }
    });
  });
        $("#tickets").click(function(){
      var data1 =$(this).attr('id');
      $.ajax({
      url:"./dashboard.php",
      method:"post",
      data:{tkts:data1},
      dataType:"JSON",
      success:function(result){
         $("#datatable").html("<div class='' id='res'></div>");
      $("#res").html("<table id='data' class='table  no-wrap table-bordered table-striped   '><thead><th>Userid</th><th>Ticket_id</th><th>stage</th></thead><tbody></tbody><tfoot></tfoot></table>");
      for (var i in result.userid){
      $("tbody").append('<tr><td>'+result.userid[i]+'</td><td>'+result.tkt_id[i]+'</td><td>'+result.stage[i]+'</td></tr>')
      i++;}
 
      $("#data").DataTable({
        "scrollX": true
      });
      },
      error:function(xhr){
        alert(xhr)
      }
    });

  });
    $("#notify").click(function(){
    var data1 =$(this).attr('id');
         $.ajax({
      url:"./dashboard.php",
      method:"post",
      data:{notify:data1},
      dataType:"JSON",
      success:function(result){
         $("#datatable").html("<div class='' id='res'></div>");
      $("#res").html("<table id='data' class='table  no-wrap table-bordered  table-striped '><thead><th>Category</th><th>combination</th><th>year</th></thead><tbody></tbody><tfoot></tfoot></table>");
      for (var i in result.category){
      $("tbody").append('<tr><td>'+result.category[i]+'</td><td>'+result.combination[i]+'</td><td>'+result.year [i]+'</td></tr>')
      i++;}
 
      $("#data").DataTable({
        "scrollX": true
      });
      },
      error:function(xhr){
        alert(xhr)
      }
    });
  }); 
      $("#assign").click(function(){
    var assignment =$(this).attr('id');
          $.ajax({
      url:"./dashboard.php",
      method:"post",
      data:{assignment:assignment},
      dataType:"JSON",
      success:function(result){
      if (result.msg) {
         $("#datatable").html(result.msg);
      }else{
      $("#datatable").html("<div class='' id='res'></div>");
      $("#res").html("<table id='ats' class='table  no-wrap table-bordered  table-striped '><thead><th>Name</th><th>Combination</th><th>Year</th><th>Topic</th><th>Date_of_submission</th><th>Date_of_submitted</th><th>Subject</th></thead><tbody></tbody><tfoot></tfoot></table>");
      for (var i in result.topic){
      $("tbody").append('<tr><td>'+result.name[i]+'</td><td>'+result.combination[i]+'</td><td>'+result.year[i]+'</td><td>'+result.topic[i]+'</td><td>'+result.doc[i]+'</td><td>'+result.dos[i]+'</td><td>'+result.subject[i]+'</td></tr>');
      i++;
    }
       $("#ats").DataTable({
        "scrollX": true
      });
      }
       },
      error:function(xhr){
        alert(xhr)
      }
    });
  });  

$('#teachers').click(function(){
 var id=this.id;
      $.ajax({
      url:"./dashboard.php",
      method:"post",
      data:{teacher:id},
      dataType:"JSON",
      success:function(result){
         if (result.msg) {
      }else{
      $("#datatable").html("<div class='' id='res'></div>");
      $("#res").html("<table id='ats' class='table  no-wrap table-bordered  table-striped '><thead><th>Name</th><tbody></tbody><tfoot></tfoot></table>");
      for (var i in result.name){
      $("tbody").append('<tr><td><a href="edit-teacher.php?op='+result.mid[i]+'&&id='+result.id[i]+'">'+result.name[i]+'</a></td></tr>');
      i++;
    }
       $("#ats").DataTable({
        "scrollX": true
      });
      }
       }
       })
    });
 
})
  

