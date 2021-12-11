$(function(){
	$("body").change(function(arg){
    element=arg.target;
    value=arg.target.value;
    id=arg.target.id;
    if (id=="username") {
    if (value=="admin") {
              $("#jqdata").html(' ');
}
else if (value!=="admin"){
      user_name=$("#username").val();
      type=arg.target.value;
      if (type!=='---select--class---') {
              $.ajax({
                          url:'./type.php',
                          method:'post',
                          data:{user_name:user_name},
                          dataType:'JSON',
                          success:function(result){
                            if (!result.msg) {
                         $("#jqdata").html('<select class="form-control" name="classes" id="classes"></select>');
                    $("#classes").append('<option>---selectclass---</option>')
                     for(var i=0 in result.nav){
                      $("#classes").append('<option value='+result.nav[i]+'>'+result.classes[i]+'</option>')
                        i++;
                           }
                         }else{
                              $("#jqdata").html('<div class="alert alert-danger" role="alert"><strong>Sorry!!!</strong> Teacher not found</div>')
                              
                            
                            }
                          }
 })

      }else{
       
      }
 } 
    }
}) 
}) 