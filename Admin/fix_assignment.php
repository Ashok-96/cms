<?php
session_start();

if (isset($_SESSION['Teacher'])) {
include 'db/dbutil.php';
		include 'assignment_functions.php';
		
  }  ?>
<!DOCTYPE html>
<html>
<head>
<title>Assignment</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>


<style>
	body{
      font-family: 'Josefin Sans', sans-serif;
    }
</style>
</head>
<body>
	<?php include 'topbar.php';  ?>
	<div class="container">
		<div class="d-flex mt-1">
		<div class="col-lg-12">
			
			<div class="" id="Submited">
			<div class="container">
						<div class="col-lg-4">
						<?php
							$fun=new Assignment();
						$var=explode('/',$_SESSION['class']);
						  ?>
						  <select class="form-control" onchange="location=this.value">
						 <option >---Seletct the topic</option>
						  	<?php
						 $dem='SELECT DISTINCT `assignment_title` FROM `assignment` ';
						  	 $fun->topics($dem); 
						  	  ?>
						  </select>
					</div>
					<?php if (isset($_GET)) { ?>
				<table class=" table table-bordered table-sm border-dark table-responsives" id="submission">
				<thead class="alert-success border-dark">
					<th class="alert-success border-dark">Assignment_title</th>
					<th class="alert-success border-dark">Name</th>
					<th class="alert-success border-dark">Register_number</th>
					<th class="alert-success border-dark">Date of submission</th>	
					<th class="alert-success border-dark">Submitted file</th>
					<th class="alert-success border-dark">Submitted on</th>
					<th class="alert-success border-dark">Remarks</th>
				</thead>	
				<tbody>
				
				  			<?php
				  			 $var=explode('/', $_SESSION['class']);
			  		
				$db = new dbutil();
				$title=$_GET['assignment_title'];
				$sql='SELECT * FROM `submission` INNER JOIN `assignment` ON `assignment`.assignment_title=`submission`.assignment_title JOIN `users` ON `users`.id=`submission`.submitted_by WHERE `assignment`. subject="Theory_of_computation" AND `assignment`.assignment_title="'.$title.'"';

				$res=$db->queryRequest($sql);

				if ($res) {
				if ($res->num_rows>0) {
					while ($row=$res->fetch_assoc()) {
						
						?>
							<tr class="border-dark">
								<td class=" border-dark"><?php echo $row['assignment_title'];  ?></td>
								<td class="border-dark"><?php echo $row['name'];  ?></td>
								<td class="border-dark"> <?php echo $row['reg_no'];  ?></td>	
								<td class="border-dark"><?php echo $row['submitted_date'];  ?></td>
								<td class="border-dark"><?php echo $row['date_of_submission'];  ?></td>
								<?php

									echo "<td  class='border-dark'><a href='./Submission/".$row['submitted_file']."' download='./Submission/".$row['submitted_file']."'>".$row['submitted_file']."</a></td>";
											 ?></td>
									<td class=" border-dark"><?php echo $row['remarks'];  ?></td>
								
							</tr>

				<?php	}
				}else{
					echo " Assignment aren't fixed to/submited by students";
				}
				}
			  ?>
			  </tbody>
			  </table>	
			</div>
				<div class="row">
					
					<div class="col-lg-8 p-5">
						<h3>Students not submitted</h3>
						<div class=" table-responsive">
				<table class="table table-sm  table-bordered border-dark" id="nosubmission">
				<thead class="alert-primary border-dark">
					<th class="border-dark">Assignment_title</th>
					<th class="border-dark">Name</th>
					<th class="border-dark">Register_number</th>
				</thead>	
				<tbody>
					<?php
						
					  $usub='SELECT * FROM `submission` INNER JOIN `assignment` ON `assignment`.assignment_title=`submission`.assignment_title JOIN `users` ON `users`.id!=`submission`.submitted_by WHERE `assignment`. subject="Theory_of_computation" AND `assignment`.assignment_title="'.$_GET['assignment_title'].'"';	
						
				$fun->unsubmitters($usub);
						

 ?>
				</tbody>
				</table>
					</div>
				</div>
		
			</div>
		</div>
				<div class="col-lg-8 mt-2 " >
				<a href="#fix" class="btn btn-primary " data-toggle="collapse">Fix an assignment</a>
					<div class="collapse" id="fix">
					<form  class="form-group p-5"  enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars('fix_assignment.php') ?>" >
						<div class="form-group">
						<label for="fgroup">Combination</label>
						<input type="text" class="form-control bg-white" value="<?php echo $var[0]; ?>" name="combination" readonly>
						</div>
						<div class="form-group" >
							<label for="fyear">Year</label>
						<input type="text" class="form-control bg-white" value="<?php echo $var[1]; ?>" name="year" readonly>

				
						</div>
						<div class="form-group" id="jqdata">
								<label for="fyear">subject</label>
						<input type="text" class="form-control bg-white" value="<?php echo $var[2]; ?>" name="subject" readonly>
						</div>
						<div class="form-group">
							<label for="assignment_title">Assignment Title</label>
							<input type="text" class="form-control col-lg-10 m-2" id="assignment_title" name="assignment_title" >
						</div>
						<div class="form-group">
							<label for="desc">Description</label>
							<textarea rows="08" cols="13" name="desc" id="desc" class="form-control col-lg-10 m-2"></textarea>
						</div>
						<div class="form-group">
							<label for="dos">Date of Submission</label>
							<input type="date" name="dos" class="form-control col-lg-10 m-2">
						</div>
						<div class="form-group">
							<label for="file">File</label>
							<input class="form-control col-lg-8 m-2" type="file" name="file" type="image/*" capture="camera">
						</div>
							<input class="btn btn-primary " type="submit" name="submit"  value="submit">
					</form>
					</div>
				</div>
			</div>
			</div>
		</div>	
		</div>
		<?php
		if (isset($_POST['submit'])) {
		$folder='uploadassignment/';
		$group=$_POST['combination'];
		$year=$_POST['year'];
		$subject=$_POST['subject'];
		$dos=$_POST['dos'];
		$fname=$_FILES['file']['name'];
		$ftemp=$_FILES['file']['tmp_name'];
		$assignment_title=$_POST['assignment_title'];
		$desc=$_POST['desc'];
		$db=new dbutil();	
		$query='INSERT INTO `assignment`( `combination`,`year`,`subject`,`assignment_title`,`description`,`date_of_submission`,`file_name`)VALUES("'.$group.'","'.$year.'","'.$subject.'","'.$assignment_title.'","'.$desc.'","'.$dos.'","'.$fname.'")' ;
		$res=$db->queryRequest($query);
		if ($res) {
		$up=move_uploaded_file($ftemp,$folder.$fname);
		if ($up) {
			echo "<script>window.location.href='fix_assignment.php?status=success'</script>";
		}else{
			echo "<script>window.location.href='fix_assignment.php?status=upnotsuccess'</script>";
			}
		}else{
			echo "<script>window.location.href='fix_assignment.php?status=querynot'</script>";				
		}
	}

}
?>
<script >
	$(document).ready(function(){
	$("#submission").DataTable();
	$("#nosubmission").DataTable();	

	})
</script>
	</div>
</body>
</html>