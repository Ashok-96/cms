$(function(){
  $(".hover").popover({ 

            title: 'Notification',
            html: true, 
              async: false,
            placement: 'bottom',
           content:edit()
          
  });
  function edit(){
        var hey=" ";
    var id=1;
    $.ajax({
      url:"./fetch.php",
      method:"post",
      data:{id:id},
      success:function(result,status){
          hey=result;
      },
      error:function(){
        var data='sorry';
           
      }
    });
        return hey
       
  }
});