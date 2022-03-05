<?php
session_start();
if (isset($_SESSION['Teacher'])) {
include 'db/dbutil.php';
  }  ?>
<!DOCTYPE html>
<html>
<head>
<title>Assignment</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.css"/>
<style>
	body{
      font-family: 'Josefin Sans', sans-serif;
    }
</style>
</head>
<body>
	<?php include 'topbar.php';  ?>
	<div class="container">
		<div class="d-flex mt-2">
		<div class="col-lg-12">
			<a href="#Submited" data-toggle="collapse" class="btn btn-success">Submited assignments</a>
			
			<div class="collapse" id="Submited">
			<div class="container p-5 ">

				<table class=" table table-responsive table-sm  table-bordered" id="submission">
				<thead>
					<th>Assignment_title</th>
					<th>Name</th>
					<th>Register_number</th>
					<th>Submitted on</th>
					<th>Date of submission</th>
					<th>Date Difference</th>
					<th>Submitted file</th>
					<th>Remarks</th>
				</thead>	
				<tbody>
				
				  			<?php
				  			 $var=explode('/', $_SESSION['class']);
			  		
				$db = new dbutil();
	include 'assignment_functions.php';
						$fun=new Assignment();

				if (isset($_GET['assignment_title'])) {
					$it=$_GET['assignment_title'];
				$sql='SELECT * FROM `submission` INNER JOIN `assignment` ON `assignment`.assignment_title=`submission`.assignment_title JOIN `users` ON `users`.id=`submission`.submitted_by WHERE `assignment`. subject="'.$var[2].'" AND `assignment`.assignment_title="'.$it.'" ';
				}else{	
				echo $var[2];
				}
				$res=$db->queryRequest($sql);
				if ($res) {
				if ($res->num_rows>0) {
					while ($row=$res->fetch_assoc()) {
						
						?>
							<tr>
								<td><?php echo $row['assignment_title'];  ?></td>
								<td><?php echo $row['name'];  ?></td>
								<td><?php echo $row['reg_no'];  ?></td>	
								<td><?php echo $row['submitted_date'];  ?></td>
								<td><?php echo $row['date_of_submission'];  ?></td>
								<td><?php $ds=$row['date_of_submission']; 
								$sd=$row['submitted_date'];
								$d1=new DateTime($ds); 
								$d2=new DateTime($sd);
								$diff=$d2->diff($d1);
								$c=$diff->d;
								if ($c>=2) {
										echo "<span class='text-primary'>".$c." Days before";
									}else if($c==1){
										echo $c." Day before";

									}else if($c==0){
										echo "<span class='text-success'>Submited on time</span>";
									}	

									echo "<td><a href='./Submission/".$row['submitted_file']."' download='./Submission/".$row['submitted_file']."'>".$row['submitted_file']."</a></td>";
											 ?></td>
								</td>
									<td><?php echo $row['remarks'];  ?></td>
								
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
				<table class="table table-sm  table-bordered" id="submission">
				<thead>
					<th>Assignment_title</th>
					<th>Name</th>
					<th>Register_number</th>
				</thead>	
				<tbody>
					<?php
						if (isset($_GET['assignment_title'])) {
							$itt=$_GET['assignment_title'];
							$usub='SELECT e.submitted_by,e.assignment_title,a.date_of_submission,a.assignment_title,d.id,d.name,d.reg_no FROM `submission` e JOIN `users` d ON e.submitted_by!=d.id JOIN `assignment` a ON e.assignment_title=a.assignment_title WHERE a.assignment_title="'.$itt.'" ';
						}else{
					  $usub="SELECT e.submitted_by,e.assignment_title,a.date_of_submission,a.assignment_title,d.id,d.name,d.reg_no FROM `submission` e JOIN `users` d ON e.submitted_by!=d.id JOIN `assignment` a ON e.assignment_title=a.assignment_title WHERE `assignment`. subject='".$var[2]."''";	
						}
				$fun->unsubmitters($usub);
						

 ?>
				</tbody>
				</table>
					</div>
				</div>
				<div class="col-lg-4">
						<?php
					
						  ?>
						  <select class="form-control" onchange="location=this.value">
						  	<option>---Seletct the topic</option>
						  	<?php
						  	$dem='SELECT DISTINCT `assignment_title` FROM `assignment` WHERE `subject`="'.$var[2].'"';
						  	 $fun->topics($dem);  ?>
						  </select>
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
		$group=mysqli_escape_string($_POST['combination']);
		$year=mysqli_escape_string($_POST['year']);
		$subject=mysqli_escape_string($_POST['subject']);
		$dos=mysqli_escape_string($_POST['dos']);
		$fname=mysqli_escape_string($_FILES['file']['name']);
		$ftemp=mysqli_escape_string($_FILES['file']['tmp_name']);
		$assignment_title=mysqli_escape_string($_POST['assignment_title']);
		$desc=mysqli_escape_string($_POST['desc']);
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

?>
	</div>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/jquery.datatables.min.js"></script>
<script type="text/javascript" src="js/datatables.bootstrap4.min.js"></script>

<script type="text/javascript" src="js/assignment.js"></script>
</html>