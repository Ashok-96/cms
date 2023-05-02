    <?php
        include('../../Common files/db/dbutil.php');
        $db=new DButil();

    ?> 
      <!DOCTYPE html>
      <html lang="en">
      <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Others</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,300&display=swap" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
      <script type="text/javascript" src="js/sdashboard.js"></script>
      <script type="text/javascript" src="js/popover.js"></script>
     <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/af-2.5.3/b-2.3.6/b-html5-2.3.6/datatables.min.css" rel="stylesheet"/>
 
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/af-2.5.3/b-2.3.6/b-html5-2.3.6/datatables.min.js"></script>
 </head>
      <body>
      <?php 
      ?>
      <?php include('../navigation.php'); ?>
      <div class="container ">
      <div class="row">
      <div class="col-lg-4 ">
      <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" >   
      <div class="form-group  m-3">
          <label for="semester">Semester</label>
          <select class="form-select" aria-label="Default select example" name="semester" id="semester" required>
          <option >Select the semester</option>
          <option value="I">I</option>
          <option value="II">II</option>
          <option value="III">III</option>
          <option value="IV">IV</option>
          <option value="V">V</option>
          <option value="VI">VI</option>
          
          </select>
      </div>
      <div class="form-group  m-3">
      <label for="combination">Combination</label> 
      <input type="text" name="combination" id="combination" class="form-control" required>
      </div>
      <div class="form-group  m-3">
      <label for="subject_name">Subject_Name</label>
      <input type="text" name="subject_name" id="subject_name" class="form-control" required>
      </div>
      <div class="form-group m-3">
      <input class="btn btn-primary" type="submit" value="submit" name="submit">
      </div>
      </form>
      </div>
      <div class="col-lg-8 p-2 mx-auto">
      <table class="table table-border" id="classes">
    <thead class="bg-primary text-white">
      <tr>
        <th scope="col">Subject_code</th>
        <th scope="col">Combination</th>
        <th scope="col">Semester</th>
        <th scope="col">Subject</th>

      </tr>
    </thead>
   <tbody> 
   <?php
    
    
    $query_1="SELECT * FROM `subjects` WHERE 1";
    $res=$db->queryRequest($query_1);  
    while($row=$res->fetch_assoc()){
        echo "<tr><td>".$row['subject_code']."</td><td>".$row['combination']."</td><td>".$row['semester']."</td><td>".$row['subject_name']."</td></tr>";
    }
   
    ?>

    </tbody>
  </table>
   
      </div>
      </div>          
      </div>
      </body>
      <?php
      if(isset($_POST['submit'])){
        $subject_id="S".rand(000000,999999);
        $input=Array();
        $input['combination']=htmlspecialchars($_POST['combination']) ;
      $input['semester']=htmlspecialchars($_POST['semester']);
      $input['subject_id']=htmlspecialchars($subject_id);
      $input['subject_name']=htmlspecialchars($_POST['subject_name']);

  $sql="INSERT INTO `subjects`(`combination`,`semester`,`subject_code`,`subject_name`) VALUES ('".$input['combination']."','".$input['semester']."','".$input['subject_id']."','".$input['subject_name']."')";
  try{
    $res=$db->queryRequest($sql);
    echo "<script>window.location.href='./index.php?status=success';</script>";
  }
  catch (Exception $err){
    echo $err->getMessage();
  }
  }

      ?>
      <script>
      $(document).ready( function () {
    $('#classes').DataTable();
} );
      </script>
      </html>