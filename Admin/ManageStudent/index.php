<?php
include '../db/dbutil.php';
$db = new DButil();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Student</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<style>
    tr:.even{
        background: gray;
    }
    </style>
</head>
<body>
<?php
include '../navigation.php';
?>
<div class="container">
    
    <div class=" m-2" >
        <?php
        if(isset($_GET['status'])){
            if($_GET['status']=='success'){
                echo '   <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>updated successfully!</strong> .
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }else{
                echo '   <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>something went wrong!</strong> Please try after sometime.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';

            }
        }
        ?>
    <table id="datatable" class=" table table-sm table-bordered    m-2">
        <thead class="thead border">
            <th class="border border-dark bg-primary bg-gradient text-white">Firstname</th>
            <th class="border border-dark bg-primary bg-gradient text-white">Lastname</th>
            <th class="border border-dark bg-primary bg-gradient text-white">Registerd number</th>
            <th class="border border-dark bg-primary bg-gradient text-white">Combination</th>
            <th class="border border-dark bg-primary bg-gradient text-white">Year</th>
            <th class="border border-dark bg-primary bg-gradient text-white">Action</th>
            <tbody class="table-striped">
            <?php

           
            $sql = 'SELECT * FROM `users`';
            $result = $db->queryRequest($sql);
            while($row=$result->fetch_assoc()){
    
               echo "<tr>";

                echo "<td class='border border-dark'>".$row['Firstname']."</td>";
                echo "<td class='border border-dark'>".$row['Lastname']."</td>";
                if($row['reg_no']=='YTD'){
                    echo "<td class='border border-dark'>#N/A</td>";

                }else{
                    echo "<td class='border border-dark'>".$row['reg_no']."</td>";
                }
                
                echo "<td class='border border-dark'>".$row['combination']."</td>";
                echo "<td class='border border-dark'>".$row['year']."</td>";
                echo '<td class="border border-dark"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Edit'.$row['id'].'">
                Edit
              </button>
              
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletestaticBackdrop">
                Delete
              </button></td>';
              include './Edit/index.php';
              include './Delete/index.php';

              echo "</tr>";
             
            }
            ?>
            </tbody>
        </thead>
    </table>
   
  

</div>    
</body>
<script>
    $(document).ready(function(){
        console.log('hello')
        $("#datatable").DataTable();

    })
</script>
</html>
