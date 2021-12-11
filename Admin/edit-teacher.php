	<?php
	error_reporting(0);
	session_start();
	include 'db/dbutil.php';
	$val=md5('edit');
	if (isset($_GET['op'])==$val) {

		$_SESSION['TID']=$_GET['id'];
		$id=$_SESSION['TID'];
		echo $id;
		class tdetails extends dbutil
		{	
		function GetTdetails($sql)
{
     $result=parent::queryRequest($sql);
  if ($result->num_rows> 0) {
    while ($row=$result->fetch_assoc()) {
      $array['name'][]=$row['name'];
      $var=explode(',', $row['subjects']);
      $count=count($var);
      if ($count>1) { 
        
         foreach ($var as $key => $value) {
          $array['dealings'][]=$value;
       $array['cout'][]=$count;
         }
      }else{
        $array['dealings'][]=$var[0];
       

      }

    
  foreach ($array['dealings'] as $value) {
      $var=explode('/', $value);
      $array['comb'][]=$var[0];
       $array['year'][]=$var[1];
       $array['subjects'][]=$var[2];
    }


  
return $array;
}
}
else{
	$array['msg'][]='not for';
return $array;

}
		}
	}
	?>
<!DOCTYPE html>
<html>
<head>
	        <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Edit Teacher</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="js/edit-teacher.js"></script>
</head>
<body>
<?php 
include 'topbar.php';
$ob=new tdetails();
$sql="SELECT `name`,`subjects` FROM `admin` WHERE `id`='$id'";
$res=$ob->GetTdetails($sql);

  ?>
  <div class="container">
<form method="post" action="update.php">
	<div class="form-group">
		<label for="name">Name:</label>
	<input type="text" name="name"  class="form-control bg-white" value="<?php echo $res['name'][0]; ?>" readonly>
	</div>
<div class="form-group">
		<label for="name">Name:</label>
	<a href="update.php?id=<?php echo $id ?>&&op=delete">delete</a>
	</div>
<?php
if (count($res['comb'])==0) {
	echo '<div class="row"  id="combination">';
	echo '</div>';
	echo '<div class="row"  id="year">';
	echo '</div>';
	echo '<div class="row"  id="subjects">';
	echo '</div>';



	
}else{


 if (count($res['comb'])>=1) {
 	$i=1;
	echo '<label for="combination" >combination</label>';
	echo '<div class="row"  id="combination">';
	foreach ($res['comb'] as $key ) {

			# code...
	echo '<div class="form-group p-2" id="combination'.$i.'">';
	echo '<input  class="form-control  col-lg-auto" type="text" name="combination[]" value="'.$key.'" readonly />
';
	echo '</div >';
	$i++;
	}
		
	  echo '</div >';
}else{
	echo '<div class="row"  id="combination">';
	echo '<div class="form-group p-2" id="combination'.$i.'">';
	echo '<input  class="form-control"  type="text" name="combination[]" value="'.$res['comb'][0].'" readonly />';
     echo '</div>';
     echo '</div >';
}
if (count($res['year'])>=1) {
	$i=1;
	echo '<label for="year">year</label>';
	echo '<div class="row" id="year">';
	foreach ($res['year'] as $key ) {
	echo '<div class="form-group p-2"  id="year'.$i.'" >';
	echo '<input  class="form-control  col-lg-auto" type="text" name="year[]" value="'.$key.'" readonly />
';
$i++;
	echo '</div >';
	}
	echo '</div >';
}else{
		echo '<div class="row" id="year">';
	echo '<div class="form-group p-2" id="year">';
	echo '<input  class="form-control"  id="year'.$i.'" type="text" name="year[]" value="'.$res['year'][0].'" readonly />';
     echo '</div>';
     echo '</div >';
}
if (count($res['subjects'])>=1) {
	$i=1;
	echo '<label for="subjects">subjects</label>';
	echo '<div class="row" id="subjects">';
	foreach ($res['subjects'] as $key ) {
	echo '<div class="form-group p-2"  id="subjects'.$i.'" >';
	echo '<input  class="form-control   col-lg-auto" type="text" name="subjects[]" value="'.$key.'"  readonly/>
';
	echo '</div >';
$i++;
	}
	echo '</div >';
}else{
	echo '<div class="row" id="subjects">';
	echo '<div class="form-group p-2"  id="subjects'.$i.'"  >';
	echo '<input  class="form-control" type="text" name="subjects[]" value="'.$res['subjects'][0].'" />';
     echo '</div>';
     echo '</div >';
}
}
  ?>
<div class="form-group float-right">
	      <button type="button" class="btn btn-secondary" id="aclass" count='<?php echo count($res['comb']) ?>'  >Add class</button>
        <button type="button" class="btn btn-primary" id="rclass" count='<?php echo count($res['comb']) ?>' >Remove Class</button>
</div>
<input type="submit" class="btn btn-primary" name="submit"  value="submit">
</div>
</form>
</body>

</body>
</html>
<?php } ?>