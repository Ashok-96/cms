$(function(){
   var id=$(".popovers").attr('id');
    $.ajax({
      url:"./fetch.php",
      method:"post",
      data:{id:id},
      dataType:'json',
      success:function(result,status){
        var title=result.title;
        for (var i in result.title){
             Push.create(''+result.title[i]+'',{
    icon:'https://ui-avatars.com/api/?name="'+result.title[i]+'"&&rounded=true',
    body:''+result.category[i]+'<a href="read_message1.php"></a>',
    link:'',
    
    });
        }
      },
      error:function(){
        var data='sorry';
       
      }
    });
   
       
});