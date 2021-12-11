$(document).ready(function(){
  var id="<?php echo $res['id'] ?>";
  $('.toast').toast('show');
  $("#<?php echo $res['id'] ?>").click(function(){
$.post('read_notification.php',{id:id},function(data,status){
  window.location.href="read_notification.php";
});
  });
});