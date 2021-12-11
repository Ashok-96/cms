<!DOCTYPE html>
<html>
<head>


	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
    <title></title>
</head>
<body>
<form>
	<input type="text" name="demo1"  id="demo" value="to check1">
	<input type="text" name="demo2" id="demo" value="to check2">
	<input type="text" name="demo3" id="demo" value="to check3">

<textarea id="editor" name='editor' class="form-control">
	<a href="1_IMG-20190816-WA0018.jpg">sdfasd</a>
</textarea>
<input type="submit" name="submit" value="submit">
</form>
<script>
  $(function(){
    var split = location;

    var dum=split.split('?');
      alert(dum[0]);
  })
</script>

 
<?php
include 'db/dbutil.php';
$db = new dbutil();
$date=date('d-M-yy');
$comb='bca';
$date_add="CREATE TRIGGER `2_web_programming` AFTER INSERT ON `users` FOR EACH ROW BEGIN  INSERT INTO `bca/2/web_programming`(`id`) VALUES(new.id);  END";
   $res=$db->queryRequest($date_add);
   if ($res) {
     echo "success";
   }else{
    echo "sorry";
   }
session_start();
  date_default_timezone_set("Asia/Kolkata");
 include_url( 'http://34.65.201.59/app/welcome/includes/db.inc.php');

  if (!$connect) {
    echo "error connecting the DB";
  }else{
    echo "succes";
  }
 


 ?>

<iframe style="width: 50%; height: 50%;"   src="http://34.65.201.59/app/welcome
"></iframe>
</body>
</html>