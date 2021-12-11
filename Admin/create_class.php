
<?php
session_start();
if (isset($_POST['number'])) {
	$_SESSION["cno"]=$_POST['number'];
	$count=$_SESSION["cno"];
	$i=1;
	while ($i<=$count) {
		echo'<input class="col-lg-5" type="text" name="class'.$i.'" placeholder="class'.$i.'"><br>
		<small class="text-muted">Name should contain underscore</small><br>';
		$i++;
	}


}
  ?>
  <div class="dropdown-divider"></div>
  <input class="btn btn-info" type="submit" name="submit" value="submit" style="border: 3px groove;">
</form>  
<?php if (isset($_POST['submit'])) {

	$i=$_SESSION["cno"];
	for ($j=1; $j<=$i; $j++) {
	    $class=$_POST["class".$j.""];

		echo "<tr>".$class."</tr>";
		header('refresh:2 url=class_allocation.php');
		$con=mysqli_connect("localhost","root","","users");
		$sql=mysqli_query($con,"CREATE TABLE `$class`(`id` int(5) NOT NULL PRIMARY KEY,`name` varchar(30) NOT NULL ,`reg_no` varchar(20) NOT NULL)");

	}
      if($sql){

      	echo "<script>alert('classes created successfully'); </script>";
      }else{
      	echo "error";
      }

}

 ?>